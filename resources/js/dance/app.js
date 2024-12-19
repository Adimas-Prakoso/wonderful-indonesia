import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('dances', () => ({
    dances: [
        {
            'image': 'https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/24/2021/07/tari-1-1.jpg',
            'dance-name': 'Tari Saman',
            'provinsi': 'Aceh',
            'link': 'traditional-dances/dance-info?name=Tari-Saman'
        },
        {
            'image': 'https://cdn1.katadata.co.id/media/images/thumb/2019/12/21/2019_12_21-12_54_28_dc79cfcbc1af6ef5055f835cc06d5485_960x640_thumb.jpg',
            'dance-name': 'Tari Pendet',
            'provinsi': 'Bali',
            'link': 'traditional-dances/dance-info?name=Tari-Pendet'
        },
        {
            'image': 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiSgV-ZgJrJXRLqN-Fm6Rh9jjdt7myKa5r6RiJMBAQtT-zHrojzoJwiK4Eawu4KhW31LJo0vFzv3VbP8V15C0JQYbluwjsLDPY2J0MgtEVsfmFKIE8o5tileMtj7I-eDji-HxddW0Wqrs4/s640/Sejarah-Asal-Usul-Tari-Piring-serta-Perkembangannya-Kumpulan-Sejarah.png',
            'dance-name': 'Tari Piring',
            'provinsi': 'Sumatera Barat',
            'link': 'traditional-dances/dance-info?name=Tari-Piring'
        },
        {
            'image': 'https://asset.kompas.com/crops/1X03mvt0Uhv6hUR67HBSPgXn8Ac=/0x0:0x0/750x500/data/photo/buku/63072f7758008.jpg',
            'dance-name': 'Tari Jaipong',
            'provinsi': 'Jawa Barat',
            'link': 'traditional-dances/dance-info?name=Tari-Jaipong'
        },
        {
            'image': 'https://awsimages.detik.net.id/community/media/visual/2020/08/25/tari-kecak-1_169.jpeg?w=1200',
            'dance-name': 'Tari Kecak',
            'provinsi': 'Bali',
            'link': 'traditional-dances/dance-info?name=Tari-Kecak'
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
            // const response = await fetch('/api/dances');
            // this.dances = await response.json();
            
            this.loading = false;
        } catch (error) {
            console.error('Error loading dances:', error);
            this.loading = false;
        }
    },

    get filteredDances() {
        let filtered = [...this.dances];

        // Filter berdasarkan pencarian
        if (this.searchQuery) {
            const query = this.searchQuery.toLowerCase();
            filtered = filtered.filter(dance => 
                dance['dance-name'].toLowerCase().includes(query) ||
                dance.provinsi.toLowerCase().includes(query)
            );
        }

        // Filter berdasarkan provinsi
        if (this.selectedProvince !== 'all') {
            filtered = filtered.filter(dance => dance.provinsi === this.selectedProvince);
        }

        // Urutkan berdasarkan nama
        filtered.sort((a, b) => {
            const nameA = a['dance-name'].toLowerCase();
            const nameB = b['dance-name'].toLowerCase();
            return this.sortOrder === 'asc' 
                ? nameA.localeCompare(nameB)
                : nameB.localeCompare(nameA);
        });

        return filtered;
    },

    filterDances() {
        // Method ini dipanggil ketika ada perubahan pada filter
        // Tidak perlu implementasi karena menggunakan computed property
    },

    async searchDanceImage(danceName) {
        try {
            const searchQuery = encodeURIComponent(`${danceName} traditional dance indonesia`);
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
            return '/images/default-dance.jpg';
        } catch (error) {
            console.error('Error searching for dance image:', error);
            return '/images/default-dance.jpg';
        }
    }
}));

Alpine.start();
