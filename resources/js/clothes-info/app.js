import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('clothesInfo', () => ({
    clothes: null,
    uniqueness: '',
    meaning: '',
    gallery: [],
    mainImage: '',
    clothesName: '',
    province: '',
    origin: '',
    lightboxOpen: false,
    currentImageIndex: 0,
    loading: true,

    async generateOrigin(clothesName) {
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
                                text: `Jelaskan dengan singkat (maksimal 2 kalimat) asal daerah dari pakaian adat ${clothesName} dalam bahasa Indonesia.`
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

    async generateUniqueness(clothesName) {
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
                                text: `Jelaskan keunikan dari pakaian adat ${clothesName} dalam bahasa Indonesia. Fokus pada:
                                1. Desain yang khas
                                2. Bahan yang digunakan
                                3. Motif atau pola khusus
                                4. Teknik pembuatan tradisional
                                5. Pengaruh budaya daerah

                                Format dalam paragraf HTML dengan tag <p>.`
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
            return '<p>Maaf, informasi keunikan tidak dapat dimuat saat ini.</p>';
        }
    },

    async generateMeaning(clothesName) {
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
                                text: `Jelaskan makna dan filosofi dari pakaian adat ${clothesName} dalam bahasa Indonesia. Fokus pada:
                                1. Makna simbolis
                                2. Nilai budaya
                                3. Kepercayaan tradisional
                                4. Signifikansi sosial
                                5. Konteks sejarah

                                Format dalam paragraf HTML dengan tag <p>.`
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
            return '<p>Maaf, informasi makna tidak dapat dimuat saat ini.</p>';
        }
    },

    async searchClothesImages(clothesName) {
        try {
            const searchQuery = encodeURIComponent(`${clothesName} pakaian adat indonesia`);
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
            return ['/images/default-clothes.jpg'];
        } catch (error) {
            console.error('Error searching for clothes images:', error);
            return ['/images/default-clothes.jpg'];
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
        this.clothesName = urlParams.get('name');
        this.loading = true;

        if (this.clothesName) {
            this.clothes = {
                name: this.clothesName.replace(/-/g, ' '),
                province: urlParams.get('province') || 'Indonesia'
            };

            try {
                // Cari gambar dan generate konten secara paralel
                const [images, uniquenessText, meaningText, originText] = await Promise.all([
                    this.searchClothesImages(this.clothesName),
                    this.generateUniqueness(this.clothesName),
                    this.generateMeaning(this.clothesName),
                    this.generateOrigin(this.clothesName)
                ]);

                // Set gambar dan konten
                this.mainImage = images[0];
                this.gallery = images;
                this.uniqueness = uniquenessText;
                this.meaning = meaningText;
                this.origin = originText;
            } catch (error) {
                console.error('Error initializing clothes info:', error);
            } finally {
                this.loading = false;
            }
        } else {
            console.error('No clothes name provided in URL');
            this.loading = false;
        }
    }
}));

Alpine.start();
