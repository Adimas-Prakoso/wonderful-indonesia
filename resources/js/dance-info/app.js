import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('danceInfo', () => ({
    dance: null,
    history: '',
    meaning: '',
    uniqueness: '',
    danceImage: '',
    danceName: '',
    supportingImages: [],

    async generateHistory(danceName) {
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
                                text: `Create a comprehensive historical account of the ${danceName} traditional dance from Indonesia. Include:
                                1. Origins and background
                                2. When it first appeared
                                3. Creator or originators (if known)
                                4. Historical development over time
                                5. Role in the history of its region of origin

                                Format the response in neat paragraphs using HTML <p> tags.`
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
            return '<p>Sorry, historical information cannot be loaded at this time.</p>';
        }
    },

    async generateMeaning(danceName) {
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
                                text: `Explain the deep meaning and philosophy of the ${danceName} traditional dance from Indonesia. Include:
                                1. Meaning of the dance movements
                                2. Underlying philosophy
                                3. Cultural values conveyed
                                4. Moral messages embedded
                                5. Connection to local beliefs and customs

                                Format the response in neat paragraphs using HTML <p> tags.`
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
            console.error('Error generating meaning:', error);
            return '<p>Sorry, meaning and philosophy information cannot be loaded at this time.</p>';
        }
    },

    async generateUniqueness(danceName) {
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
                                text: `Describe the unique characteristics and distinctive features of the ${danceName} traditional dance from Indonesia. Include:
                                1. Main characteristics that distinguish it from other dances
                                2. Costumes and accessories used
                                3. Accompanying music and musical instruments
                                4. Formation and number of dancers
                                5. Special occasions when this dance is performed

                                Format the response in neat paragraphs using HTML <p> tags.`
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

    async searchDanceImages(danceName) {
        try {
            const searchQuery = encodeURIComponent(`${danceName} traditional dance indonesia`);
            const apiUrl = `https://api.lolhuman.xyz/api/gimage2?apikey=044c6181db2702df3b33c06f&query=${searchQuery}`;

            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data.status === 200 && data.result && data.result.length > 0) {
                // Ambil 5 gambar pertama untuk galeri
                const images = data.result.slice(0, 5);
                console.log('Found images:', images);
                return images;
            }

            console.log('No images found, using default images');
            return ['/images/default-dance.jpg'];
        } catch (error) {
            console.error('Error searching for dance images:', error);
            return ['/images/default-dance.jpg'];
        }
    },

    async init() {
        const urlParams = new URLSearchParams(window.location.search);
        this.danceName = urlParams.get('name');

        if (this.danceName) {
            this.dance = {
                name: this.danceName.replace(/-/g, ' '),
                provinsi: 'Indonesia'
            };

            // Cari gambar dan generate konten secara paralel
            const [images, historyText, meaningText, uniquenessText] = await Promise.all([
                this.searchDanceImages(this.danceName),
                this.generateHistory(this.danceName),
                this.generateMeaning(this.danceName),
                this.generateUniqueness(this.danceName)
            ]);

            // Set gambar dan konten
            this.danceImage = images[0];
            this.supportingImages = images.slice(1);
            this.history = historyText;
            this.meaning = meaningText;
            this.uniqueness = uniquenessText;
        } else {
            console.error('No dance name provided in URL');
        }
    }
}));

Alpine.start();
