import Alpine from 'alpinejs';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import { Vector as VectorLayer } from 'ol/layer';
import { Vector as VectorSource } from 'ol/source';
import { Style, Icon } from 'ol/style';

let mapInstance = null;

window.Alpine = Alpine;

Alpine.data('destinationInfo', () => ({
    destination: null,
    coordinates: { lat: 0, lng: 0 },
    description: '',
    weather: null,
    destinationImage: '',
    destinationName: '',

    async searchDestinationImage(destinationName) {
        try {
            const searchQuery = encodeURIComponent(`${destinationName} wisata indonesia tourism`);
            const apiUrl = `https://api.lolhuman.xyz/api/gimage2?apikey=044c6181db2702df3b33c06f&query=${searchQuery}`;

            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data.status === 200 && data.result && data.result.length > 0) {
                const randomIndex = Math.floor(Math.random() * Math.min(10, data.result.length));
                const selectedImage = data.result[randomIndex];
                console.log('Selected image:', selectedImage);
                return selectedImage;
            }

            console.log('No images found, using default image');
            return '/images/default-destination.jpg';
        } catch (error) {
            console.error('Error searching for destination image:', error);
            return '/images/default-destination.jpg';
        }
    },

    async generateDescription(destinationName) {
        try {
            const response = await fetch(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=AIzaSyAr_pqvU5FeTEBjex9PTzZ4Rm1kAuHVRVw",
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        contents: [{
                            parts: [{
                                text: `Create a detailed and comprehensive description of ${destinationName} as a tourist destination in Indonesia. Please include:

1. A captivating introduction about its significance and appeal
2. Historical background and cultural importance
3. Detailed description of main attractions and unique features
4. Natural or architectural highlights
5. Best activities tourists can enjoy
6. Practical information (best time to visit, accessibility)
7. Cultural experiences and local customs
8. Nearby attractions or points of interest
9. Why this destination is special in Indonesia's tourism landscape
10. Interesting facts or trivia about the location

Please write in a professional yet engaging tone, suitable for a tourism website. Format the response in HTML paragraphs using <p> tags, with appropriate spacing between sections.`
                            }]
                        }],
                        generationConfig: {
                            temperature: 0.7,
                            maxOutputTokens: 1024,
                        }
                    })
                }
            );

            const data = await response.json();
            
            if (data.candidates && data.candidates[0].content.parts[0].text) {
                return data.candidates[0].content.parts[0].text;
            }

            throw new Error('No valid response from Gemini API');
        } catch (error) {
            console.error('Error generating description:', error);
            return `
                <p>This magnificent tourist destination offers spectacular views and unique experiences for visitors.</p>
                <p>With its pristine natural beauty, it has become one of Indonesia's most favorite tourism spots.</p>
                <p>Visitors can enjoy various activities while immersing themselves in the rich cultural heritage and natural wonders of the area.</p>
            `;
        }
    },

    async init() {
        if (mapInstance) {
            mapInstance.setTarget(null);
            mapInstance = null;
        }

        const urlParams = new URLSearchParams(window.location.search);
        this.destinationName = urlParams.get('name');

        if (this.destinationName) {
            this.destination = {
                name: this.destinationName,
                provinsi: 'Indonesia'
            };

            console.log('Searching images for:', this.destinationName);
            this.destinationImage = await this.searchDestinationImage(this.destinationName);
            console.log('Image set to:', this.destinationImage);

            try {
                const goApiResponse = await fetch(`https://api.goapi.io/places?search=${this.destinationName}&api_key=ebe4c398-2cb9-5ad0-5692-d6b2d018`);
                const goApiData = await goApiResponse.json();

                if (goApiData.status === 'success' && goApiData.data.results.length > 0) {
                    const place = goApiData.data.results[0];
                    this.coordinates = {
                        lat: parseFloat(place.lat),
                        lng: parseFloat(place.lng)
                    };
                    
                    if (place.province) {
                        this.destination.provinsi = place.province;
                    }
                    
                    await this.$nextTick();
                    this.initMap();
                } else {
                    console.error('No location data found for:', this.destinationName);
                }
            } catch (error) {
                console.error('Error fetching location data:', error);
            }

            await this.getWeather();

            this.description = await this.generateDescription(this.destinationName);
        } else {
            console.error('No destination name provided in URL');
        }
    },

    initMap() {
        const mapElement = document.getElementById('map');
        if (!mapElement) return;

        const coordinates = fromLonLat([this.coordinates.lng, this.coordinates.lat]);
        
        const marker = new Feature({
            geometry: new Point(coordinates)
        });

        const vectorSource = new VectorSource({
            features: [marker]
        });

        const vectorLayer = new VectorLayer({
            source: vectorSource,
            style: new Style({
                image: new Icon({
                    anchor: [0.5, 0.5],
                    anchorXUnits: 'fraction',
                    anchorYUnits: 'fraction',
                    src: '/images/marker.png',
                    scale: 0.1,
                    offset: [0, 0]
                })
            })
        });

        mapInstance = new Map({
            target: 'map',
            layers: [
                new TileLayer({
                    source: new OSM()
                }),
                vectorLayer
            ],
            view: new View({
                center: coordinates,
                zoom: 13
            })
        });
    },

    destroy() {
        if (mapInstance) {
            mapInstance.setTarget(null);
            mapInstance = null;
        }
    },

    async getWeather() {
        try {
            const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${this.coordinates.lat}&lon=${this.coordinates.lng}&units=metric&appid=cb53a17a31e82b8af2a7783dc1354465`);
            const data = await response.json();

            this.weather = {
                temp: data.main.temp,
                humidity: data.main.humidity,
                windSpeed: data.wind.speed,
                description: data.weather[0].description,
                icon: data.weather[0].icon
            };
        } catch (error) {
            console.error('Error fetching weather data:', error);
        }
    }
}));

window.addEventListener('beforeunload', () => {
    if (mapInstance) {
        mapInstance.setTarget(null);
        mapInstance = null;
    }
});

Alpine.start();