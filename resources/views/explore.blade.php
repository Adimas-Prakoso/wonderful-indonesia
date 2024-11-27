<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore - Wonderful Indonesia</title>
    @vite('resources/css/explore/app.css')
</head>
<body class="bg-white font-sans" x-data="navigation">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <div class="flex items-center">
                    <img src="{{ asset('images/wonderful-indonesia-logo.png') }}" alt="Wonderful Indonesia" class="h-8 md:h-12">
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 lg:space-x-12">
                

                    <!-- Language Switcher -->
                    <div class="relative" @click.away="languageMenuOpen = false">
                        <button @click="languageMenuOpen = !languageMenuOpen"
                                class="flex items-center space-x-2 text-gray-700 hover:text-red-600 focus:outline-none">
                            <span x-text="languages[currentLang].name">English</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Language Dropdown -->
                        <div x-show="languageMenuOpen"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                             style="display: none;">
                            <div class="py-1">
                                <template x-for="(lang, code) in languages" :key="code">
                                    <button @click="currentLang = code; languageMenuOpen = false"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-red-600"
                                            :class="{ 'bg-gray-50': currentLang === code }">
                                        <div class="flex items-center">
                                            <img :src="lang.flag" class="w-5 h-5 mr-3 rounded-sm" :alt="lang.name">
                                            <span x-text="lang.name"></span>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center space-x-4">
                    <!-- Mobile Language Switcher -->
                    <button @click="languageMenuOpen = !languageMenuOpen"
                            class="text-gray-700 hover:text-red-600 focus:outline-none">
                        <img :src="languages[currentLang].flag" class="w-6 h-6 rounded-sm" :alt="languages[currentLang].name">
                    </button>

                    <!-- Mobile Menu Toggle -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="text-gray-700 hover:text-red-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Category Cards -->
    <section class="pt-24 pb-12 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12">Explore Indonesia's Treasures</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Category Cards -->
                @php
                $categories = [
                    [
                        'title' => 'Destinations',
                        'link' => '/destinations',
                        'icon' => file_get_contents(asset('svg/destination.svg'))
                    ],
                    [
                        'title' => 'Traditional Dances',
                        'link' => '/traditional-dances',
                        'icon' => file_get_contents(asset('svg/traditional-dance.svg'))
                    ],
                    [
                        'title' => 'Batik',
                        'link' => '/batik',
                        'icon' => file_get_contents(asset('svg/batik.svg'))
                    ],
                    [
                        'title' => 'Traditional Clothes',
                        'link' => '/traditional-clothes',
                        'icon' => file_get_contents(asset('svg/traditional-clothes.svg'))
                    ],
                    [
                        'title' => 'Traditional House',
                        'link' => '/traditional-house',
                        'icon' => file_get_contents(asset('svg/traditional-house.svg'))
                    ],
                    [
                        'title' => 'Traditional Weapon',
                        'link' => '/traditional-weapon',
                        'icon' => file_get_contents(asset('svg/traditional-weapon.svg'))
                    ],
                    [
                        'title' => 'Musical Instruments',
                        'link' => '/musical-instruments',
                        'icon' => file_get_contents(asset('svg/musical-instrument.svg'))
                    ],
                    [
                        'title' => 'Food',
                        'link' => '/food',
                        'icon' => file_get_contents(asset('svg/food.svg'))
                    ],
                ];
                @endphp

                @foreach($categories as $category)
                <a href="{{ $category['link'] }}" class="transform hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl">
                        <div class="flex justify-center mb-4 text-blue-600">
                            {!! $category['icon'] !!}
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $category['title'] }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Destinations Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Popular Destinations</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $destinations = [
                    [
                        'image' => asset('images/borobudur.webp'),
                        'name' => 'Borobudur Temple',
                        'simple_description' => 'Lorem Ipsum Dorem',
                        'link' => '/explore/destination/borobudur-temple'
                    ],
                    [
                        'image' => asset('images/raja-ampat.webp'),
                        'name' => 'Raja Ampat',
                        'simple_description' => 'Lorem Ipsum Dorem',
                        'link' => '/explore/destination/raja-ampat'
                    ],
                    [
                        'image' => asset('images/komodo.webp'),
                        'name' => 'Komodo Island',
                        'simple_description' => 'Lorem Ipsum Dorem',
                        'link' => '/explore/destination/komodo-island'
                    ],
                ];

                foreach ($destinations as $destination): ?>
                    <a href="<?php echo $destination['link']; ?>" class="destination-card group">
                        <img
                            src="<?php echo $destination['image']; ?>"
                            alt="<?php echo $destination['name']; ?>"
                            class="w-full h-full object-cover"
                        >
                        <div class="content">
                            <h3 class="text-2xl font-bold text-white mb-2">
                                <?php echo $destination['name']; ?>
                            </h3>
                            <p class="text-gray-200">
                                <?php echo $destination['simple_description']; ?>
                            </p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('images/wonderful-indonesia-logo-white.png') }}" alt="Wonderful Indonesia" class="h-12 mb-4">
                    <p class="text-gray-400">Discover the beauty of Indonesia's diverse culture and natural wonders.</p>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="/destinations" class="text-gray-400 hover:text-white transition-colors duration-300">Destinations</a></li>
                        <li><a href="/culture" class="text-gray-400 hover:text-white transition-colors duration-300">Culture</a></li>
                        <li><a href="/events" class="text-gray-400 hover:text-white transition-colors duration-300">Events</a></li>
                    </ul>
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
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
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
