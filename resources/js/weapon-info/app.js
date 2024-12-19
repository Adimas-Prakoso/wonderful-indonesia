import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('weaponInfo', () => ({
    weapon: null,
    history: '',
    weaponOrigin: '',
    gallery: [],
    mainImage: '',
    weaponName: '',
    origin: '',
    lightboxOpen: false,
    currentImageIndex: 0,
    loading: true,

    async generateOrigin(weaponName) {
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
                                text: `Briefly describe (in 2 sentences maximum) the origin region of the ${weaponName} traditional weapon from Indonesia in English.`
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

    async generateHistory(weaponName) {
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
                                text: `Write a comprehensive historical account of the ${weaponName} traditional weapon from Indonesia in English. Include:
                                1. Historical background and development
                                2. Cultural significance and symbolism
                                3. Role in traditional warfare and ceremonies
                                4. Notable historical events or figures associated with it
                                5. Evolution and variations through different periods
                                6. Traditional forging techniques and materials
                                7. Spiritual and mythological connections
                                8. Impact on Indonesian martial arts
                                9. Regional variations and influences
                                10. Modern preservation efforts

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
            console.error('Error generating history:', error);
            return '<p>Sorry, history information cannot be loaded at this time.</p>';
        }
    },

    async generateWeaponOrigin(weaponName) {
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
                                text: `Explain the origins and development of the ${weaponName} traditional weapon from Indonesia in English. Focus on:
                                1. Geographic origins and spread
                                2. Historical period of emergence
                                3. Cultural and social context
                                4. Influences from other cultures
                                5. Traditional creation myths or legends

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
            console.error('Error generating weapon origin:', error);
            return '<p>Sorry, origin information cannot be loaded at this time.</p>';
        }
    },

    async searchWeaponImages(weaponName) {
        try {
            const searchQuery = encodeURIComponent(`${weaponName} traditional weapon indonesia`);
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
            return ['/images/default-weapon.jpg'];
        } catch (error) {
            console.error('Error searching for weapon images:', error);
            return ['/images/default-weapon.jpg'];
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
        this.weaponName = urlParams.get('name');
        this.loading = true;

        if (this.weaponName) {
            this.weapon = {
                name: this.weaponName.replace(/-/g, ' '),
                province: urlParams.get('province') || 'Indonesia'
            };

            try {
                // Search images and generate content in parallel
                const [images, historyText, weaponOriginText, originText] = await Promise.all([
                    this.searchWeaponImages(this.weaponName),
                    this.generateHistory(this.weaponName),
                    this.generateWeaponOrigin(this.weaponName),
                    this.generateOrigin(this.weaponName)
                ]);

                // Set images and content
                this.mainImage = images[0];
                this.gallery = images;
                this.history = historyText;
                this.weaponOrigin = weaponOriginText;
                this.origin = originText;
            } catch (error) {
                console.error('Error initializing weapon info:', error);
            } finally {
                this.loading = false;
            }
        } else {
            console.error('No weapon name provided in URL');
            this.loading = false;
        }
    }
}));

Alpine.start();
