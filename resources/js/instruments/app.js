import Alpine from 'alpinejs';
import { GoogleGenerativeAI } from "@google/generative-ai";

window.Alpine = Alpine;

Alpine.data('instruments', () => ({
    instruments: [
        {
            'instrument-name': 'Angklung',
            'provinsi': 'Jawa Barat',
            'image': 'https://akcdn.detik.net.id/visual/2018/01/06/c893bc48-d3d9-4c83-ba3f-5eb57d5eb5b7_169.jpeg?w=650',
            'link': 'musical-instruments/instrument-info?name=Angklung',
        },
        {
            'instrument-name': 'Gamelan',
            'provinsi': 'Jawa Tengah',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7tf5-IW-WTfRAWjaGRBqf5s-a9RWn4qdhEg&s',
            'link': 'musical-instruments/instrument-info?name=Gamelan',
        },
        {
            'instrument-name': 'Sasando',
            'provinsi': 'Nusa Tenggara Timur',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7V2qx0X36AA8S6zoJhsQRst-TTPB176s2lg&s',
            'link': 'musical-instruments/instrument-info?name=Sasando',
        },
    ],
    filteredInstruments: [],
    searchQuery: '',
    selectedProvince: 'all',
    sortOrder: 'asc',
    provinces: [],
    loading: true,

    init() {
        // Extract unique provinces
        this.provinces = [...new Set(this.instruments.map(instrument => instrument.provinsi))].sort();
        
        // Initial filter
        this.filterInstruments();
        
        // Set loading to false after initialization
        this.loading = false;
    },

    filterInstruments() {
        this.loading = true;

        // Filter by search query and province
        let filtered = this.instruments.filter(instrument => {
            const matchesSearch = instrument['instrument-name'].toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                instrument.provinsi.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            const matchesProvince = this.selectedProvince === 'all' || instrument.provinsi === this.selectedProvince;
            
            return matchesSearch && matchesProvince;
        });

        // Sort instruments
        filtered.sort((a, b) => {
            const nameA = a['instrument-name'].toLowerCase();
            const nameB = b['instrument-name'].toLowerCase();
            
            if (this.sortOrder === 'asc') {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        this.filteredInstruments = filtered;
        this.loading = false;
    },

    async generateDescription(instrumentName) {
        const genAI = new GoogleGenerativeAI(process.env.GOOGLE_AI_KEY);
        const model = genAI.getGenerativeModel({ model: "gemini-pro" });

        const prompt = `Berikan deskripsi singkat tentang alat musik tradisional ${instrumentName} dalam bahasa Indonesia. Fokus pada sejarah, cara memainkan, dan nilai budayanya. Maksimal 3 paragraf.`;

        try {
            const result = await model.generateContent(prompt);
            const response = await result.response;
            return response.text();
        } catch (error) {
            console.error('Error generating description:', error);
            return 'Maaf, terjadi kesalahan saat mengambil deskripsi.';
        }
    }
}));

Alpine.start();
