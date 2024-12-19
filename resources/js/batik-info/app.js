import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('batikInfo', () => ({
    batik: null,
    history: '',
    characteristics: '',
    philosophy: '',
    usage: '',
    batikImage: '',
    batikName: '',
    supportingImages: [],

    async generateHistory(batikName) {
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
                                text: `Create a comprehensive historical account of the ${batikName} batik pattern from Indonesia. Include:
                                1. Origins and historical background
                                2. When and where it first emerged
                                3. Historical significance in Indonesian culture
                                4. Development through different periods
                                5. Notable artisans or regions associated with this pattern

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

    async generateCharacteristics(batikName) {
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
                                text: `Describe the distinctive characteristics of the ${batikName} batik pattern from Indonesia. Include:
                                1. Main motifs and patterns
                                2. Color schemes traditionally used
                                3. Techniques used in creation
                                4. Materials and tools required
                                5. Unique features that distinguish it

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
            console.error('Error generating characteristics:', error);
            return '<p>Sorry, characteristics information cannot be loaded at this time.</p>';
        }
    },

    async generatePhilosophy(batikName) {
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
                                text: `Explain the philosophy and symbolism behind the ${batikName} batik pattern from Indonesia. Include:
                                1. Symbolic meanings of the patterns
                                2. Cultural significance
                                3. Traditional beliefs associated
                                4. Spiritual or philosophical concepts
                                5. Social and cultural values represented

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
            console.error('Error generating philosophy:', error);
            return '<p>Sorry, philosophy information cannot be loaded at this time.</p>';
        }
    },

    async generateUsage(batikName) {
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
                                text: `Describe the traditional and modern uses of the ${batikName} batik pattern from Indonesia. Include:
                                1. Traditional ceremonial uses
                                2. Modern fashion applications
                                3. Cultural events where it's worn
                                4. Contemporary adaptations
                                5. Economic and social impact

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
            console.error('Error generating usage information:', error);
            return '<p>Sorry, usage information cannot be loaded at this time.</p>';
        }
    },

    async searchBatikImages(batikName) {
        try {
            const searchQuery = encodeURIComponent(`${batikName} indonesian batik pattern textile`);
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
            return ['/images/default-batik.jpg'];
        } catch (error) {
            console.error('Error searching for batik images:', error);
            return ['/images/default-batik.jpg'];
        }
    },

    async init() {
        const urlParams = new URLSearchParams(window.location.search);
        this.batikName = urlParams.get('name');

        if (this.batikName) {
            this.batik = {
                name: this.batikName.replace(/-/g, ' '),
                provinsi: 'Indonesia'
            };

            // Cari gambar dan generate konten secara paralel
            const [images, historyText, characteristicsText, philosophyText, usageText] = await Promise.all([
                this.searchBatikImages(this.batikName),
                this.generateHistory(this.batikName),
                this.generateCharacteristics(this.batikName),
                this.generatePhilosophy(this.batikName),
                this.generateUsage(this.batikName)
            ]);

            // Set gambar dan konten
            this.batikImage = images[0];
            this.supportingImages = images.slice(1);
            this.history = historyText;
            this.characteristics = characteristicsText;
            this.philosophy = philosophyText;
            this.usage = usageText;
        } else {
            console.error('No batik name provided in URL');
        }
    }
}));

Alpine.start();
