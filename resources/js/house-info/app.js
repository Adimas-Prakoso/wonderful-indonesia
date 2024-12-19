import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('houseInfo', () => ({
    house: null,
    uniqueness: '',
    houseFunction: '',
    gallery: [],
    mainImage: '',
    houseName: '',
    origin: '',
    lightboxOpen: false,
    currentImageIndex: 0,
    loading: true,

    async generateOrigin(houseName) {
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
                                text: `Briefly describe (in 2 sentences maximum) the origin region of the ${houseName} traditional house from Indonesia in English.`
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
            return data.candidates[0].content.parts[0].text;
        } catch (error) {
            console.error('Error generating origin:', error);
            return 'Indonesia';
        }
    },

    async generateUniqueness(houseName) {
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
                                text: `Describe the unique characteristics of the ${houseName} traditional house from Indonesia in English. Focus on:
                                1. Distinctive architecture
                                2. Building materials used
                                3. Ornaments and carvings
                                4. Traditional construction techniques
                                5. Regional cultural influences

                                Format the response in paragraphs using HTML <p> tags.`
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
            return data.candidates[0].content.parts[0].text;
        } catch (error) {
            console.error('Error generating uniqueness:', error);
            return '<p>Sorry, uniqueness information cannot be loaded at this time.</p>';
        }
    },

    async generateFunction(houseName) {
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
                                text: `Explain the functions and uses of the ${houseName} traditional house from Indonesia in English. Focus on:
                                1. Main functions
                                2. Room divisions
                                3. Social and cultural functions
                                4. Use in traditional ceremonies
                                5. Modern adaptations

                                Format the response in paragraphs using HTML <p> tags.`
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
            return data.candidates[0].content.parts[0].text;
        } catch (error) {
            console.error('Error generating function:', error);
            return '<p>Sorry, function information cannot be loaded at this time.</p>';
        }
    },

    async searchHouseImages(houseName) {
        try {
            const searchQuery = encodeURIComponent(`${houseName} traditional house indonesia`);
            const apiUrl = `https://api.lolhuman.xyz/api/gimage2?apikey=044c6181db2702df3b33c06f&query=${searchQuery}`;

            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data.status === 200 && data.result && data.result.length > 0) {
                // Get first 5 images for gallery
                const images = data.result.slice(0, 5);
                console.log('Found images:', images);
                return images;
            }

            console.log('No images found, using default images');
            return ['/images/default-house.jpg'];
        } catch (error) {
            console.error('Error searching for house images:', error);
            return ['/images/default-house.jpg'];
        }
    },

    openLightbox(index) {
        this.currentImageIndex = index;
        this.lightboxOpen = true;
        document.body.style.overflow = 'hidden';
    },

    closeLightbox() {
        this.lightboxOpen = false;
        document.body.style.overflow = '';
    },

    previousImage() {
        this.currentImageIndex = (this.currentImageIndex - 1 + this.gallery.length) % this.gallery.length;
    },

    nextImage() {
        this.currentImageIndex = (this.currentImageIndex + 1) % this.gallery.length;
    },

    async init() {
        const urlParams = new URLSearchParams(window.location.search);
        this.houseName = urlParams.get('name');
        this.loading = true;

        if (this.houseName) {
            this.house = {
                name: this.houseName.replace(/-/g, ' '),
                province: urlParams.get('province') || 'Indonesia'
            };

            try {
                // Search images and generate content in parallel
                const [images, uniquenessText, functionText, originText] = await Promise.all([
                    this.searchHouseImages(this.houseName),
                    this.generateUniqueness(this.houseName),
                    this.generateFunction(this.houseName),
                    this.generateOrigin(this.houseName)
                ]);

                // Set images and content
                this.mainImage = images[0];
                this.gallery = images;
                this.uniqueness = uniquenessText;
                this.houseFunction = functionText;
                this.origin = originText;
            } catch (error) {
                console.error('Error initializing house info:', error);
            } finally {
                this.loading = false;
            }
        } else {
            console.error('No house name provided in URL');
            this.loading = false;
        }
    }
}));

Alpine.start();
