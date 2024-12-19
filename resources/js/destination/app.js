import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data('destinations', () => ({
    destinations: [
        {
            'image': 'https://korporat.ancol.com/shared/file-manager/Korporat%20Press%20Release/DANCING%20FOUNTAIN.png',
            'destination-name': 'Ancol',
            'provinsi': 'Jakarta',
            'link': '/explore/destinations/destination-info?name=Ancol'
        },
        {
            'image': 'https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/revision-2019/4.jpg',
            'destination-name': 'Borobudur Temple',
            'provinsi': 'Jawa Tengah',
            'link': '/explore/destinations/destination-info?name=Borobudur Temple'
        },
        {
            'image': 'https://upload.wikimedia.org/wikipedia/commons/7/7d/Mount_Bromo_at_sunrise%2C_showing_its_volcanoes_and_Mount_Semeru_%28background%29.jpg',
            'destination-name': 'Mount Bromo',
            'provinsi': 'Jawa Timur',
            'link': '/explore/destinations/destination-info?name=Mount Bromo'
        },
        {
            'image': 'https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/24/2022/01/cerita-legenda-gunung-semeru-lead.jpg',
            'destination-name': 'Mount Semeru',
            'provinsi': 'Jawa Tengah',
            'link': '/explore/destinations/destination-info?name=Mount Semeru'
        },
        {
            'image': 'https://bnp.jambiprov.go.id/wp-content/uploads/2023/02/raja-ampat.png',
            'destination-name': 'Raja Ampat',
            'provinsi': 'Papua',
            'link': '/explore/destinations/destination-info?name=Raja Ampat'
        },
        {
            'image': 'https://imgsrv2.voi.id/gh_3eLY0jJzM6MpOHnXSHXP6dPxUKfKbZ_0FiFY2Mzc/auto/1200/675/sm/1/bG9jYWw6Ly8vcHVibGlzaGVycy8xOTk4OTAvMjAyMjA4MTAyMDM5LW1haW4uY3JvcHBlZF8xNjYwMTM4ODYxLmpwZw.jpg',
            'destination-name': 'Komodo Island',
            'provinsi': 'Nusa Tenggara Timur',
            'link': '/explore/destinations/destination-info?name=Komodo National Park'
        }
    ],
    searchQuery: '',
    sortOrder: 'asc',
    selectedProvince: 'all',
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

    filterDestinations() {
        console.log('Filtering destinations...');
        return this.filteredDestinations;
    },

    get filteredDestinations() {
        let filtered = [...this.destinations];

        if (this.searchQuery) {
            filtered = filtered.filter(dest => 
                dest['destination-name'].toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                dest.provinsi.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }

        if (this.selectedProvince !== 'all') {
            filtered = filtered.filter(dest => dest.provinsi === this.selectedProvince);
        }

        filtered.sort((a, b) => {
            const nameA = a['destination-name'].toLowerCase();
            const nameB = b['destination-name'].toLowerCase();
            return this.sortOrder === 'asc' 
                ? nameA.localeCompare(nameB)
                : nameB.localeCompare(nameA);
        });

        return filtered;
    },

    init() {
        console.log('Component initialized');
        console.log('Initial destinations:', this.destinations);
    }
}));

Alpine.start();
