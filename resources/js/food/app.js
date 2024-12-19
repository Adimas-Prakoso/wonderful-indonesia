import Alpine from 'alpinejs';
import { GoogleGenerativeAI } from "@google/generative-ai";

window.Alpine = Alpine;

Alpine.data('foods', () => ({
    foods: [
        {
            'food-name': 'Rendang',
            'provinsi': 'Sumatera Barat',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkqXjFsBMMKVLwLBXmctpYdQdMQLasJpEEcw&s',
            'link': 'food/food-info?name=Rendang',
        },
        {
            'food-name': 'Soto Betawi',
            'provinsi': 'DKI Jakarta',
            'image': 'https://www.unileverfoodsolutions.co.id/dam/global-ufs/mcos/SEA/calcmenu/recipes/ID-recipes/soups/soto-betawi/main-header.jpg',
            'link': 'food/food-info?name=Soto-Betawi',
        },
        {
            'food-name': 'Gudeg',
            'provinsi': 'Yogyakarta',
            'image': 'https://img.inews.co.id/media/1200/files/inews_new/2023/03/04/Asal_usul_gudeg.jpg',
            'link': 'food/food-info?name=Gudeg',
        },
    ],
    filteredFoods: [],
    searchQuery: '',
    selectedProvince: 'all',
    sortOrder: 'asc',
    provinces: [],
    loading: true,

    init() {
        // Extract unique provinces
        this.provinces = [...new Set(this.foods.map(food => food.provinsi))].sort();
        
        // Initial filter
        this.filterFoods();
        
        // Set loading to false after initialization
        this.loading = false;
    },

    filterFoods() {
        this.loading = true;

        // Filter by search query and province
        let filtered = this.foods.filter(food => {
            const matchesSearch = food['food-name'].toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                food.provinsi.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            const matchesProvince = this.selectedProvince === 'all' || food.provinsi === this.selectedProvince;
            
            return matchesSearch && matchesProvince;
        });

        // Sort foods
        filtered.sort((a, b) => {
            const nameA = a['food-name'].toLowerCase();
            const nameB = b['food-name'].toLowerCase();
            
            if (this.sortOrder === 'asc') {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        this.filteredFoods = filtered;
        this.loading = false;
    },

    async generateDescription(foodName) {
        const genAI = new GoogleGenerativeAI(process.env.GOOGLE_AI_KEY);
        const model = genAI.getGenerativeModel({ model: "gemini-pro" });

        const prompt = `Berikan deskripsi singkat tentang makanan tradisional ${foodName} dalam bahasa Indonesia. Fokus pada sejarah, bahan-bahan, dan cara pembuatannya. Maksimal 3 paragraf.`;

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
