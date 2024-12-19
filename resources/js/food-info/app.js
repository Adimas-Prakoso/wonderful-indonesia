import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('foodInfo', () => ({
    food: null,
    description: '',
    history: '',
    uniqueness: '',
    recipe: '',
    gallery: [],
    mainImage: '',
    foodName: '',
    origin: '',
    lightboxOpen: false,
    currentImageIndex: 0,
    loading: true,

    async generateOrigin(foodName) {
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
                                text: `Briefly describe (in 2 sentences maximum) the origin region of the ${foodName} traditional food from Indonesia in English.`
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

    async generateDescription(foodName) {
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
                                text: `Write a comprehensive description of ${foodName}, a traditional Indonesian dish, in English. Include:
                                1. Overview of the dish
                                2. Main ingredients
                                3. Taste profile and flavors
                                4. Regional variations
                                5. Serving suggestions
                                6. Cultural significance

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
            console.error('Error generating description:', error);
            return '<p>Sorry, description cannot be loaded at this time.</p>';
        }
    },

    async generateHistory(foodName) {
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
                                text: `Explain the history and origins of ${foodName}, a traditional Indonesian dish, in English. Focus on:
                                1. Historical background
                                2. Cultural origins
                                3. Evolution over time
                                4. Historical significance
                                5. Traditional preparation methods
                                6. Regional influences
                                7. Cultural preservation

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
            console.error('Error generating history:', error);
            return '<p>Sorry, history information cannot be loaded at this time.</p>';
        }
    },

    async generateUniqueness(foodName) {
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
                                text: `Describe the unique features and special characteristics of ${foodName}, a traditional Indonesian dish, in English. Include:
                                1. Distinctive ingredients
                                2. Unique preparation methods
                                3. Special flavors and textures
                                4. Cultural significance
                                5. Regional specialties
                                6. Health benefits
                                7. Modern adaptations

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

    async generateRecipe(foodName) {
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
                                text: `Provide a detailed recipe and preparation guide for ${foodName}, a traditional Indonesian dish, in English. Include:
                                1. List of ingredients with measurements
                                2. Step-by-step preparation instructions
                                3. Cooking techniques
                                4. Traditional cooking tips
                                5. Serving suggestions
                                6. Preparation time
                                7. Cooking time
                                8. Number of servings
                                9. Tips for best results
                                10. Storage recommendations

                                Format the response using HTML tags: <h3> for sections, <ul> for ingredient lists, <ol> for steps, and <p> for other text.`
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
            console.error('Error generating recipe:', error);
            return '<p>Sorry, recipe information cannot be loaded at this time.</p>';
        }
    },

    async searchFoodImages(foodName) {
        try {
            const searchQuery = encodeURIComponent(`${foodName} traditional Indonesian food`);
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
            return ['/images/default-food.jpg'];
        } catch (error) {
            console.error('Error searching for food images:', error);
            return ['/images/default-food.jpg'];
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
        this.foodName = urlParams.get('name');
        this.loading = true;

        if (this.foodName) {
            this.food = {
                name: this.foodName.replace(/-/g, ' '),
                province: urlParams.get('province') || 'Indonesia'
            };

            try {
                // Search images and generate content in parallel
                const [images, descriptionText, historyText, uniquenessText, recipeText, originText] = await Promise.all([
                    this.searchFoodImages(this.foodName),
                    this.generateDescription(this.foodName),
                    this.generateHistory(this.foodName),
                    this.generateUniqueness(this.foodName),
                    this.generateRecipe(this.foodName),
                    this.generateOrigin(this.foodName)
                ]);

                // Set images and content
                this.mainImage = images[0];
                this.gallery = images;
                this.description = descriptionText;
                this.history = historyText;
                this.uniqueness = uniquenessText;
                this.recipe = recipeText;
                this.origin = originText;
            } catch (error) {
                console.error('Error initializing food info:', error);
            } finally {
                this.loading = false;
            }
        } else {
            console.error('No food name provided in URL');
            this.loading = false;
        }
    }
}));

Alpine.start();
