<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traditional Musical Instruments - Wonderful Indonesia</title>
    @vite(['resources/css/explore/app.css', 'resources/js/instruments/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <div class="flex items-center">
                    <a href="/">
                        <img src="{{ asset('images/wonderful-indonesia-logo.png') }}" alt="Wonderful Indonesia" class="h-8 md:h-12">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-16 pb-12" x-data="instruments" x-init="init()">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-yellow-600 to-amber-500 h-[300px] mb-12">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative container mx-auto px-4 h-full flex flex-col justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Traditional Indonesian Musical Instruments</h1>
                <p class="text-xl text-white/90 max-w-2xl">Experience the enchanting sounds of Indonesia's traditional musical heritage.</p>
            </div>
        </div>
        
        <div class="container mx-auto px-4">
            <!-- Search and Filter Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 transition-all duration-300 hover:shadow-xl space-y-6">
                <!-- Search Input -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Traditional Instruments</label>
                    <div class="relative">
                        <input 
                            type="text" 
                            x-model="searchQuery"
                            @input="filterInstruments"
                            placeholder="Type to search..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300"
                        >
                        <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- Filter Options -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Sort Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                        <select 
                            x-model="sortOrder"
                            @change="filterInstruments"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300"
                        >
                            <option value="asc">Name (A - Z)</option>
                            <option value="desc">Name (Z - A)</option>
                        </select>
                    </div>

                    <!-- Province Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Filter by Province</label>
                        <select 
                            x-model="selectedProvince"
                            @change="filterInstruments"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300"
                        >
                            <option value="all">All Provinces</option>
                            <template x-for="province in provinces" :key="province">
                                <option :value="province" x-text="province"></option>
                            </template>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div x-show="loading" class="flex justify-center items-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-4 border-yellow-500 border-t-transparent"></div>
            </div>

            <!-- No Results State -->
            <div x-show="filteredInstruments.length === 0 && !loading" class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No traditional instruments found</h3>
                <p class="mt-2 text-gray-500">Try adjusting your search or filter criteria</p>
            </div>

            <!-- Instruments Grid -->
            <div x-show="filteredInstruments.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <template x-for="instrument in filteredInstruments" :key="instrument['instrument-name']">
                    <a :href="instrument.link" class="group">
                        <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-gray-100">
                            <img 
                                :src="instrument.image" 
                                :alt="instrument['instrument-name']"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="text-white text-xl font-bold mb-2" x-text="instrument['instrument-name']"></h3>
                                    <p class="text-gray-200 text-sm flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span x-text="instrument.provinsi"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </template>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('images/wonderful-indonesia-logo.png') }}" alt="Wonderful Indonesia" class="h-12 mb-4">
                    <p class="text-gray-400">Discover the beauty of Indonesia's diverse culture and natural wonders.</p>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">Email: info@indonesia-tourism.com</li>
                        <li class="text-gray-400">Phone: +62 21 123456</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.922 4.922 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-1.38-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 Wonderful Indonesia. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
