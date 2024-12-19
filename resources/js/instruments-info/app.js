import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('instrumentInfo', () => ({
    instrument: null,
    type: '',
    instrumentFunction: '',
    playingMethod: '',
    gallery: [],
    mainImage: '',
    instrumentName: '',
    origin: '',
    lightboxOpen: false,
    currentImageIndex: 0,
    loading: true,

    async generateType(instrumentName) {
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
                                text: `Write a comprehensive description of the ${instrumentName} traditional musical instrument from Indonesia in English. Include:
                                1. Physical characteristics and design
                                2. Classification in musical instrument family
                                3. Materials used in construction
                                4. Unique features and variations
                                5. Sound characteristics
                                6. Historical development
                                7. Regional variations
                                8. Cultural significance

                                Format the response in detailed paragraphs using HTML <p> tags. Make it comprehensive and engaging.`
                            }]
                        }],
                        generationConfig: {
                            temperature: 0.7,
                            maxOutputTokens: 2048,
                        }
                    })
                }
            );

            const data = await response.json();
            return data.candidates[0].content.parts[0].text;
        } catch (error) {
            console.error('Error generating type:', error);
            return '<p>Sorry, type information cannot be loaded at this time.</p>';
        }
    },

    async generateFunction(instrumentName) {
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
                                text: `Explain the functions and roles of the ${instrumentName} in Indonesian traditional music and culture in English. Focus on:
                                1. Role in traditional ensembles
                                2. Use in ceremonies and rituals
                                3. Cultural significance
                                4. Musical genres it's used in
                                5. Social and ceremonial importance
                                6. Symbolic meanings
                                7. Modern applications

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

    async generatePlayingMethod(instrumentName) {
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
                                text: `Provide a detailed explanation of how to play the ${instrumentName} traditional instrument in English. Include:
                                1. Basic playing techniques
                                2. Proper posture and positioning
                                3. Sound production methods
                                4. Advanced techniques
                                5. Common patterns and rhythms
                                6. Practice tips
                                7. Maintenance and care
                                8. Learning progression

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
            console.error('Error generating playing method:', error);
            return '<p>Sorry, playing method information cannot be loaded at this time.</p>';
        }
    },

    async searchInstrumentImages(instrumentName) {
        try {
            const searchQuery = encodeURIComponent(`${instrumentName} traditional musical instrument indonesia`);
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
            return ['/images/default-instrument.jpg'];
        } catch (error) {
            console.error('Error searching for instrument images:', error);
            return ['/images/default-instrument.jpg'];
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
        this.instrumentName = urlParams.get('name');
        this.loading = true;

        if (this.instrumentName) {
            this.instrument = {
                name: this.instrumentName.replace(/-/g, ' '),
                province: urlParams.get('province') || 'Indonesia'
            };

            try {
                // Search images and generate content in parallel
                const [images, typeText, functionText, playingMethodText] = await Promise.all([
                    this.searchInstrumentImages(this.instrumentName),
                    this.generateType(this.instrumentName),
                    this.generateFunction(this.instrumentName),
                    this.generatePlayingMethod(this.instrumentName)
                ]);

                // Set images and content
                this.mainImage = images[0];
                this.gallery = images;
                this.type = typeText;
                this.instrumentFunction = functionText;
                this.playingMethod = playingMethodText;
            } catch (error) {
                console.error('Error initializing instrument info:', error);
            } finally {
                this.loading = false;
            }
        } else {
            console.error('No instrument name provided in URL');
            this.loading = false;
        }
    }
}));

Alpine.start();
