import Alpine from 'alpinejs';
import { GoogleGenerativeAI } from "@google/generative-ai";

window.Alpine = Alpine;

Alpine.data('weapons', () => ({
    weapons: [
        {
            'weapon-name': 'Keris',
            'provinsi': 'Jawa',
            'image': 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/radarmojokerto/2023/03/WhatsApp-Image-2023-03-24-at-19.14.26-1.jpeg',
            'link': 'traditional-weapon/weapon-info?name=Keris',
        },
        {
            'weapon-name': 'Rencong',
            'provinsi': 'Aceh',
            'image': 'https://kebudayaan.kemdikbud.go.id/ditindb/wp-content/uploads/sites/9/2015/11/Rencong3.jpg',
            'link': 'traditional-weapon/weapon-info?name=Rencong',
        },
        {
            'weapon-name': 'Mandau',
            'provinsi': 'Kalimantan',
            'image': 'https://asset.kompas.com/crops/r0j0v7BLVp9Hzxqjh-BvXoiD7ok=/0x0:750x500/1200x800/data/photo/2022/01/17/61e58cc297a66.jpg',
            'link': 'traditional-weapon/weapon-info?name=Mandau',
        },
        {
            'weapon-name': 'Badik',
            'provinsi': 'Sulawesi Selatan',
            'image': 'https://fajar.co.id/wp-content/uploads/2021/02/images-4-1.jpeg',
            'link': 'traditional-weapon/weapon-info?name=Badik',
        },
        {
            'weapon-name': 'Celurit',
            'provinsi': 'Jawa Timur',
            'image': 'https://img2.beritasatu.com/cache/beritasatu/910x580-2/2023/06/1686576889-477x341.webp',
            'link': 'traditional-weapon/weapon-info?name=Celurit',
        },
        {
            'weapon-name': 'Kujang',
            'provinsi': 'Jawa Barat',
            'image': 'https://awsimages.detik.net.id/community/media/visual/2022/04/12/kujang-salah-satu-senjata-khas-jawa-barat_169.jpeg?w=650',
            'link': 'traditional-weapon/weapon-info?name=Kujang',
        },
        {
            'weapon-name': 'Tombak',
            'provinsi': 'Nusa Tenggara Timur',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5U7haM81CG_lc_uyP8saZEdmzn08iHNChMg&s',
            'link': 'traditional-weapon/weapon-info?name=Tombak',
        },
        {
            'weapon-name': 'Parang',
            'provinsi': 'Maluku',
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4w5B_gO24JjuoR8HbdJyRDPsXYSqwITyhPg&s',
            'link': 'traditional-weapon/weapon-info?name=Parang',
        }
    ],
    filteredWeapons: [],
    searchQuery: '',
    selectedProvince: 'all',
    sortOrder: 'asc',
    provinces: [],
    loading: true,

    init() {
        // Extract unique provinces
        this.provinces = [...new Set(this.weapons.map(weapon => weapon.provinsi))].sort();
        
        // Initial filter
        this.filterWeapons();
        
        // Set loading to false after initialization
        this.loading = false;
    },

    filterWeapons() {
        this.loading = true;

        // Filter by search query and province
        let filtered = this.weapons.filter(weapon => {
            const matchesSearch = weapon['weapon-name'].toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                weapon.provinsi.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            const matchesProvince = this.selectedProvince === 'all' || weapon.provinsi === this.selectedProvince;
            
            return matchesSearch && matchesProvince;
        });

        // Sort weapons
        filtered.sort((a, b) => {
            const nameA = a['weapon-name'].toLowerCase();
            const nameB = b['weapon-name'].toLowerCase();
            
            if (this.sortOrder === 'asc') {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        this.filteredWeapons = filtered;
        this.loading = false;
    },

    async generateDescription(weaponName) {
        const genAI = new GoogleGenerativeAI(process.env.GOOGLE_AI_KEY);
        const model = genAI.getGenerativeModel({ model: "gemini-pro" });

        const prompt = `Berikan deskripsi singkat tentang ${weaponName} dalam bahasa Indonesia. Fokus pada sejarah, kegunaan, dan nilai budayanya. Maksimal 3 paragraf.`;

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
