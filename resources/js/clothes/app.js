import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('clothes', () => ({
    clothes: [
        {
            'image': 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/08/04/Snapinstaapp_334849439_1981022142234940_6665247490311761773_n_1080-3630450252.jpg',
            'clothes-name': 'Kebaya',
            'provinsi': 'Jawa',
            'link': 'traditional-clothes/clothes-info?name=Kebaya'
        },
        {
            'image': 'https://infokost.id/blog/wp-content/uploads/2023/10/Nama-Pakaian-Adat-Sumatera-Utara.webp',
            'clothes-name': 'Ulos',
            'provinsi': 'Sumatera Utara',
            'link': 'traditional-clothes/clothes-info?name=Ulos'
        },
        {
            'image': 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/indizone/2021/03/06/N4snrMJ/mengenal-baju-bodo-termasuk-pakaian-adat-tertua-di-dunia-milik-suku-bugis22.jpg',
            'clothes-name': 'Baju Bodo',
            'provinsi': 'Sulawesi Selatan',
            'link': 'traditional-clothes/clothes-info?name=Baju-Bodo'
        },
        {
            'image': 'https://imgcdn.espos.id/@espos/images/2022/11/rsz_kaesang3-1.jpg?quality=60',
            'clothes-name': 'Pakaian Adat Dayak',
            'provinsi': 'Kalimantan',
            'link': 'traditional-clothes/clothes-info?name=Pakaian-Adat-Dayak'
        },
        {
            'image': 'https://awsimages.detik.net.id/community/media/visual/2022/04/20/pakaian-adat-jawa-barat-5_43.jpeg?w=1200',
            'clothes-name': 'Baju Pangsi',
            'provinsi': 'Banten',
            'link': 'traditional-clothes/clothes-info?name=Baju-Pangsi'
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
            // const response = await fetch('/api/clothes');
            // this.clothes = await response.json();
            
            this.loading = false;
        } catch (error) {
            console.error('Error loading clothes:', error);
            this.loading = false;
        }
    },

    get filteredClothes() {
        let filtered = [...this.clothes];

        // Filter berdasarkan pencarian
        if (this.searchQuery) {
            const query = this.searchQuery.toLowerCase();
            filtered = filtered.filter(cloth => 
                cloth['clothes-name'].toLowerCase().includes(query) ||
                cloth.provinsi.toLowerCase().includes(query)
            );
        }

        // Filter berdasarkan provinsi
        if (this.selectedProvince !== 'all') {
            filtered = filtered.filter(cloth => cloth.provinsi === this.selectedProvince);
        }

        // Urutkan berdasarkan nama
        filtered.sort((a, b) => {
            const nameA = a['clothes-name'].toLowerCase();
            const nameB = b['clothes-name'].toLowerCase();
            return this.sortOrder === 'asc' 
                ? nameA.localeCompare(nameB)
                : nameB.localeCompare(nameA);
        });

        return filtered;
    },

    filterClothes() {
        // Method ini dipanggil ketika ada perubahan pada filter
        // Tidak perlu implementasi karena menggunakan computed property
    },

    async searchClothImage(clothName) {
        try {
            const searchQuery = encodeURIComponent(`${clothName} indonesian traditional clothing`);
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
            return '/images/default-clothes.jpg';
        } catch (error) {
            console.error('Error searching for clothes image:', error);
            return '/images/default-clothes.jpg';
        }
    }
}));

Alpine.start();
