import Alpine from 'alpinejs';
import { GoogleGenerativeAI } from "@google/generative-ai";

window.Alpine = Alpine;

Alpine.data('houses', () => ({
    houses: [
        {
            'house-name': 'Rumah Gadang',
            'provinsi': 'Sumatera Barat',
            'image': 'https://s3-ap-southeast-1.amazonaws.com/arsitagx-master-article/article-photo/109/unnamed.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Gadang',
        },
        {
            'house-name': 'Rumah Tongkonan',
            'provinsi': 'Sulawesi Selatan',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxXHvcMsMEpo31ukTU6cGPKJM34IXlVdDX0A&s',
            'link': 'traditional-house/house-info?name=Rumah-Tongkonan',
        },
        {
            'house-name': 'Rumah Joglo',
            'provinsi': 'Jawa Tengah',
            'image': 'https://asosiasikontraktorindonesia.s3.ap-southeast-3.amazonaws.com/dt/20240716225056/Rumah-Adat-Joglo.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Joglo',
        },
        {
            'house-name': 'Rumah Honai',
            'provinsi': 'Papua',
            'image': 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Honai_House_Papua.jpg/640px-Honai_House_Papua.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Honai',
        },
        {
            'house-name': 'Rumah Limas',
            'provinsi': 'Sumatera Selatan',
            'image': 'https://img.okezone.com/content/2020/10/14/408/2293288/rumah-adat-limas-destinasi-budaya-ikonik-khas-palembang-xbkbMoOrqC.JPG',
            'link': 'traditional-house/house-info?name=Rumah-Limas',
        },
        {
            'house-name': 'Rumah Betang',
            'provinsi': 'Kalimantan Tengah',
            'image': 'https://i.pinimg.com/originals/e4/be/2a/e4be2afb4d2a640993d1ea87a54fa8c3.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Betang',
        },
        {
            'house-name': 'Rumah Panggung',
            'provinsi': 'Jambi',
            'image': 'https://patriotik.co/wp-content/uploads/2024/07/IMG-20240705-WA0015.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Panggung',
        },
        {
            'house-name': 'Rumah Krong Bade',
            'provinsi': 'Aceh',
            'image': 'https://img.merahputih.com/media/e7/8c/6e/e78c6ecd745d5c1d895af2dfcef87709.jpg',
            'link': 'traditional-house/house-info?name=Rumah-Krong-Bade',
        }
    ],
    filteredHouses: [],
    searchQuery: '',
    selectedProvince: 'all',
    sortOrder: 'asc',
    provinces: [],
    loading: true,

    init() {
        // Extract unique provinces
        this.provinces = [...new Set(this.houses.map(house => house.provinsi))].sort();
        
        // Initial filter
        this.filterHouses();
        
        // Set loading to false after initialization
        this.loading = false;
    },

    filterHouses() {
        this.loading = true;

        // Filter by search query and province
        let filtered = this.houses.filter(house => {
            const matchesSearch = house['house-name'].toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                house.provinsi.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            const matchesProvince = this.selectedProvince === 'all' || house.provinsi === this.selectedProvince;
            
            return matchesSearch && matchesProvince;
        });

        // Sort houses
        filtered.sort((a, b) => {
            const nameA = a['house-name'].toLowerCase();
            const nameB = b['house-name'].toLowerCase();
            
            if (this.sortOrder === 'asc') {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        this.filteredHouses = filtered;
        this.loading = false;
    },

    async generateDescription(houseName) {
        const genAI = new GoogleGenerativeAI(process.env.GOOGLE_AI_KEY);
        const model = genAI.getGenerativeModel({ model: "gemini-pro" });

        const prompt = `Berikan deskripsi singkat tentang ${houseName} dalam bahasa Indonesia. Fokus pada sejarah, keunikan arsitektur, dan nilai budayanya. Maksimal 3 paragraf.`;

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
