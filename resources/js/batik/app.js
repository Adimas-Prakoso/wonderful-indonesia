import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('batiks', () => ({
    batiks: [
        {
            'image': 'https://batik-tulis.com/wp-content/uploads/2015/12/batik-mega-mendung-1200x675.jpg',
            'batik-name': 'Batik Mega Mendung',
            'provinsi': 'Jawa Barat',
            'link': 'batik/batik-info?name=Batik-Mega-Mendung'
        },
        {
            'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDgTYxZJaA-cXG2R58A6PaSEcSwpWMeiKKlQ&s',
            'batik-name': 'Batik Parang',
            'provinsi': 'Yogyakarta',
            'link': 'batik/batik-info?name=Batik-Parang'
        },
        {
            'image': 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/255/2024/11/10/Genpi-2734188503.jpg',
            'batik-name': 'Batik Kawung',
            'provinsi': 'Yogyakarta',
            'link': 'batik/batik-info?name=Batik-Kawung'
        },
        {
            'image': 'https://blog.knitto.co.id/wp-content/uploads/2024/01/Batik-Sekar-Jagad-Warna-Coklat-_-Sumber_-Freepik.jpg',
            'batik-name': 'Batik Sekar Jagad',
            'provinsi': 'Jawa Tengah',
            'link': 'batik/batik-info?name=Batik-Sekar-Jagad'
        },
        {
            'image': 'https://akcdn.detik.net.id/visual/2022/01/24/batik-lasem-adalah-bentuk-akulturasi-budaya-indonesia-dan-tiongkok_169.jpeg?w=650',
            'batik-name': 'Batik Lasem',
            'provinsi': 'Jawa Tengah',
            'link': 'batik/batik-info?name=Batik-Lasem'
        }
    ],
    searchQuery: '',
    sortOrder: 'asc',
    selectedProvince: 'all',
    loading: true,
    provinces: [
        'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Jambi', 
        'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Kepulauan Bangka Belitung',
        'Kepulauan Riau', 'Jakarta', 'Jawa Barat', 'Jawa Tengah', 
        'Yogyakarta', 'Jawa Timur', 'Banten', 'Bali', 'Nusa Tenggara Barat',
        'Nusa Tenggara Timur', 'Kalimantan Barat', 'Kalimantan Tengah',
        'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
        'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan',
        'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat', 'Maluku',
        'Maluku Utara', 'Papua', 'Papua Barat'
    ],

    async init() {
        try {
            // Simulasi loading
            await new Promise(resolve => setTimeout(resolve, 1000));
            
            // Di sini nanti bisa ditambahkan fetch data dari API
            // const response = await fetch('/api/batiks');
            // this.batiks = await response.json();
            
            this.loading = false;
        } catch (error) {
            console.error('Error loading batiks:', error);
            this.loading = false;
        }
    },

    get filteredBatiks() {
        let filtered = [...this.batiks];

        // Filter berdasarkan pencarian
        if (this.searchQuery) {
            const query = this.searchQuery.toLowerCase();
            filtered = filtered.filter(batik => 
                batik['batik-name'].toLowerCase().includes(query) ||
                batik.provinsi.toLowerCase().includes(query)
            );
        }

        // Filter berdasarkan provinsi
        if (this.selectedProvince !== 'all') {
            filtered = filtered.filter(batik => batik.provinsi === this.selectedProvince);
        }

        // Urutkan berdasarkan nama
        filtered.sort((a, b) => {
            const nameA = a['batik-name'].toLowerCase();
            const nameB = b['batik-name'].toLowerCase();
            return this.sortOrder === 'asc' 
                ? nameA.localeCompare(nameB)
                : nameB.localeCompare(nameA);
        });

        return filtered;
    },

    filterBatiks() {
        // Method ini dipanggil ketika ada perubahan pada filter
        // Tidak perlu implementasi karena menggunakan computed property
    },

    async searchBatikImage(batikName) {
        try {
            const searchQuery = encodeURIComponent(`${batikName} indonesian batik pattern`);
            const apiUrl = `https://api.lolhuman.xyz/api/gimage2?apikey=044c6181db2702df3b33c06f&query=${searchQuery}`;

            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data.status === 200 && data.result && data.result.length > 0) {
                const randomIndex = Math.floor(Math.random() * Math.min(10, data.result.length));
                const selectedImage = data.result[randomIndex];
                console.log('Selected image:', selectedImage);
                return selectedImage;
            }

            console.log('No images found, using default image');
            return '/images/default-batik.jpg';
        } catch (error) {
            console.error('Error searching for batik image:', error);
            return '/images/default-batik.jpg';
        }
    }
}));

Alpine.start();
