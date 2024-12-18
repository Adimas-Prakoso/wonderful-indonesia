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
                        <h3 class="text-lg sm:text-base lg:text-lg font-semibold text-gray-800 whitespace-nowrap text-[13px]">{{ $category['title'] }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Travel Tips Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-gray-900">Essential Tips Before Visiting Indonesia</h2>
            <p class="text-gray-600 mb-8 max-w-3xl">Make the most of your Indonesian adventure with these important travel tips and recommendations.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $tips = [
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>',
                        'title' => 'Currency & Payment',
                        'description' => 'Exchange money to Indonesian Rupiah (IDR). Major cities accept cards, but keep cash for local markets and rural areas.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                        'title' => 'Weather & Clothing',
                        'description' => 'Pack light, breathable clothing. Indonesia has a tropical climate with temperatures between 25-35°C year-round.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>',
                        'title' => 'Language',
                        'description' => 'Learn basic Indonesian phrases. English is widely spoken in tourist areas, but local language knowledge is appreciated.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        'title' => 'Best Time to Visit',
                        'description' => 'Dry season (April to October) is ideal for visiting. Avoid rainy season for outdoor activities.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
                        'title' => 'Health & Safety',
                        'description' => 'Get travel insurance and necessary vaccinations. Drink bottled water and be cautious with street food.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                        'title' => 'Cultural Respect',
                        'description' => 'Dress modestly at temples. Remove shoes before entering homes. Use right hand for eating and passing items.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>',
                        'title' => 'Communication',
                        'description' => 'Get a local SIM card for affordable data and calls. WiFi is available in most hotels and cafes.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        'title' => 'Transportation',
                        'description' => 'Use ride-hailing apps in cities. Book domestic flights for island hopping. Negotiate taxi fares beforehand.'
                    ]
                ];
    
                foreach ($tips as $tip): ?>
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                        <div class="p-6">
                            <div class="text-red-600 mb-4">
                                <?php echo $tip['icon']; ?>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2"><?php echo $tip['title']; ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo $tip['description']; ?></p>
                        </div>
                    </div>
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
