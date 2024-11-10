<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderful Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/index/app.css', 'resources/js/index/app.js'])
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
                    <a href="#destinations" class="nav-link text-base lg:text-lg" x-text="translations[currentLang].destinations">Destinations</a>
                    <a href="#culture" class="nav-link text-base lg:text-lg" x-text="translations[currentLang].culture">Culture</a>
                    <a href="#rumah-adat" class="nav-link text-base lg:text-lg" x-text="translations[currentLang].traditional_houses">Traditional Houses</a>
                    <a href="#culinary" class="nav-link text-base lg:text-lg" x-text="translations[currentLang].culinary">Culinary</a>
                    <a href="#events" class="nav-link text-base lg:text-lg" x-text="translations[currentLang].events">Events</a>

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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="md:hidden"
             style="display: none;">
            <div class="px-4 pt-2 pb-3 space-y-2 bg-white shadow-lg">
                <a href="#destinations" @click="mobileMenuOpen = false"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-md"
                   x-text="translations[currentLang].destinations">Destinations</a>
                <a href="#culture" @click="mobileMenuOpen = false"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-md"
                   x-text="translations[currentLang].culture">Culture</a>
                <a href="#rumah-adat" @click="mobileMenuOpen = false"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-md"
                   x-text="translations[currentLang].traditional_houses">Traditional Houses</a>
                <a href="#culinary" @click="mobileMenuOpen = false"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-md"
                   x-text="translations[currentLang].culinary">Culinary</a>
                <a href="#events" @click="mobileMenuOpen = false"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-md"
                   x-text="translations[currentLang].events">Events</a>
            </div>

            <!-- Mobile Language Menu -->
            <div x-show="languageMenuOpen"
                 class="px-4 py-2 bg-gray-50 border-t border-gray-200"
                 style="display: none;">
                <div class="grid grid-cols-2 gap-2">
                    <template x-for="(lang, code) in languages" :key="code">
                        <button @click="currentLang = code; languageMenuOpen = false"
                                class="flex items-center space-x-2 px-3 py-2 rounded-md"
                                :class="{ 'bg-white shadow-sm': currentLang === code }">
                            <img :src="lang.flag" class="w-5 h-5 rounded-sm" :alt="lang.name">
                            <span x-text="lang.name" class="text-sm"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <div class="hero-section relative h-[90vh] md:h-screen overflow-hidden group" role="region" aria-label="Hero Slideshow">
        <!-- Hero Slides -->
        <div class="hero-slide active" role="tabpanel" aria-label="Slide 1" tabindex="0">
            <img src="{{ asset('images/hero-bali.webp') }}" class="w-full h-full object-cover" alt="Bali Temple" fetchpriority="high">
            <div class="absolute inset-0 hero-gradient"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="slide-content text-center text-white px-4 sm:px-6 lg:px-8">
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-light mb-2 sm:mb-4">Welcome to</h2>
                    <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-4 sm:mb-6 tracking-tight drop-shadow-lg">Bali Paradise</h1>
                    <p class="text-lg sm:text-xl md:text-2xl mb-8 sm:mb-12 font-light max-w-3xl mx-auto">Experience the mystical temples and stunning beaches of the Island of Gods</p>
                </div>
            </div>
        </div>

        <div class="hero-slide" role="tabpanel" aria-label="Slide 2" tabindex="0">
            <img src="{{ asset('images/raja-ampat.webp') }}" class="w-full h-full object-cover" alt="Raja Ampat" loading="lazy">
            <div class="absolute inset-0 hero-gradient"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="slide-content text-center text-white px-4">
                    <h2 class="text-2xl md:text-3xl font-light mb-4">Discover</h2>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight drop-shadow-lg">Raja Ampat</h1>
                    <p class="text-xl md:text-2xl mb-12 font-light max-w-3xl mx-auto">Dive into the world's most diverse marine life paradise</p>
                </div>
            </div>
        </div>

        <div class="hero-slide" role="tabpanel" aria-label="Slide 3" tabindex="0">
            <img src="{{ asset('images/borobudur.webp') }}" class="w-full h-full object-cover" alt="Borobudur" loading="lazy">
            <div class="absolute inset-0 hero-gradient"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="slide-content text-center text-white px-4">
                    <h2 class="text-2xl md:text-3xl font-light mb-4">Explore</h2>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight drop-shadow-lg">Ancient Wonders</h1>
                    <p class="text-xl md:text-2xl mb-12 font-light max-w-3xl mx-auto">Journey through time at the majestic Borobudur Temple</p>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="slide-nav-button left-4 slide-prev" aria-label="Previous slide">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button class="slide-nav-button right-4 slide-next" aria-label="Next slide">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Hero Content -->
        <div class="absolute inset-x-0 bottom-16 sm:bottom-20 flex justify-center z-20">
            <a href="/explore" class="explore-btn bg-indonesia-red text-white px-6 sm:px-10 py-3 sm:py-4 rounded-full text-base sm:text-lg font-medium hover:bg-red-700 transform hover:scale-105 transition-all duration-300 inline-flex items-center group shadow-xl">
                Explore Indonesia
                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <!-- Slide Navigation -->
        <div class="absolute bottom-6 sm:bottom-10 left-0 right-0 flex justify-center gap-2 sm:gap-3 z-20" role="tablist">
            <button class="slide-dot active" role="tab" aria-label="Go to slide 1" aria-selected="true" data-slide="1"></button>
            <button class="slide-dot" role="tab" aria-label="Go to slide 2" aria-selected="false" data-slide="2"></button>
            <button class="slide-dot" role="tab" aria-label="Go to slide 3" aria-selected="false" data-slide="3"></button>
        </div>
    </div>

    <!-- Featured Destinations -->
    <section id="destinations" class="py-16 sm:py-20 md:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-3 sm:mb-4">Popular Destinations</h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">Experience the most breathtaking locations across the Indonesian archipelago</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
                <div class="destination-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/borobudur.webp') }}" class="w-full h-full object-cover" alt="Borobudur">
                    </div>
                    <div class="p-8">
                        <h3 class="font-bold text-2xl mb-3">Borobudur Temple</h3>
                        <p class="text-gray-600 mb-4">The world's largest Buddhist temple, an ancient marvel in Yogyakarta.</p>
                        <a href="#" class="text-indonesia-red font-medium hover:text-red-700 inline-flex items-center">
                            Learn more
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="destination-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/raja-ampat.webp') }}" class="w-full h-full object-cover" alt="Raja Ampat">
                    </div>
                    <div class="p-8">
                        <h3 class="font-bold text-2xl mb-3">Raja Ampat</h3>
                        <p class="text-gray-600 mb-4">A paradise for divers with the world's most diverse marine life.</p>
                        <a href="#" class="text-indonesia-red font-medium hover:text-red-700 inline-flex items-center">
                            Learn more
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="destination-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/komodo.webp') }}" class="w-full h-full object-cover" alt="Komodo">
                    </div>
                    <div class="p-8">
                        <h3 class="font-bold text-2xl mb-3">Komodo Island</h3>
                        <p class="text-gray-600 mb-4">Home to the ancient Komodo dragons and pristine beaches.</p>
                        <a href="#" class="text-indonesia-red font-medium hover:text-red-700 inline-flex items-center">
                            Learn more
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Culture Section -->
     <section id="culture" class="py-16 sm:py-20 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-3 sm:mb-4">Rich Cultural Heritage</h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">Discover the diverse traditions and customs of Indonesia</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-center">
                <div class="relative group">
                    <img src="{{ asset('images/culture.webp') }}" class="rounded-2xl shadow-2xl transition-transform duration-500 group-hover:scale-105" alt="Indonesian Culture">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold mb-6">Experience Traditional Arts</h3>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Immerse yourself in Indonesia's diverse cultural heritage, from traditional dances to ancient rituals.
                        Each region offers unique traditions passed down through generations.
                    </p>
                    <ul class="space-y-6">
                        <li class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-indonesia-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Traditional Dance Performances</span>
                        </li>
                        <li class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-indonesia-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Batik Making Workshops</span>
                        </li>
                        <li class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-indonesia-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Traditional Music Performances</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Traditional Houses (Rumah Adat) Section -->
    <section id="rumah-adat" class="py-16 sm:py-20 md:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-3 sm:mb-4">Traditional Houses</h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">Explore the unique architectural heritage of Indonesia's traditional houses</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Rumah Gadang -->
                <div class="rumah-adat-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/rumah-gadang.webp') }}" alt="Rumah Gadang" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold">Rumah Gadang</h3>
                            <p class="text-sm">West Sumatra</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">The iconic house of Minangkabau people with its distinctive buffalo horn-shaped roof.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Cultural Heritage</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Tongkonan -->
                <div class="rumah-adat-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/tongkonan.webp') }}" alt="Tongkonan" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold">Tongkonan</h3>
                            <p class="text-sm">South Sulawesi</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Traditional ancestral house of the Torajan people with its distinctive boat-shaped roof.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Cultural Heritage</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Traditional</span>
                        </div>
                    </div>
                </div>

                <!-- Joglo -->
                <div class="rumah-adat-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden aspect-w-16 aspect-h-12">
                        <img src="{{ asset('images/joglo.webp') }}" alt="Joglo" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold">Joglo</h3>
                            <p class="text-sm">Central Java</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Traditional Javanese house known for its distinctive pyramid-shaped roof and sophisticated architecture.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Cultural Heritage</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Javanese</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Feature -->
            <div class="mt-12 sm:mt-16">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="p-6 sm:p-8 lg:p-12">
                            <h3 class="text-2xl sm:text-3xl font-bold mb-4">Discover More Traditional Houses</h3>
                            <p class="text-gray-600 mb-6">Indonesia has over 30 different types of traditional houses, each representing unique cultural values and architectural wisdom.</p>
                            <div class="space-y-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Unique Architecture</h4>
                                        <p class="text-gray-600 text-sm">Each house reflects local wisdom and environmental adaptation</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Cultural Significance</h4>
                                        <p class="text-gray-600 text-sm">Houses serve as symbols of cultural identity and social status</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative h-64 lg:h-auto">
                            <img src="{{ asset('images/rumah-adat-map.webp') }}" alt="Traditional Houses Map" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent lg:hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Culinary Section -->
    <section id="culinary" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Taste of Indonesia</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Savor the rich flavors of Indonesian cuisine</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="culinary-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-4 aspect-h-3">
                        <img src="{{ asset('images/rendang.webp') }}" class="w-full h-full object-cover" alt="Rendang">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Rendang</h3>
                        <p class="text-gray-600">World's most delicious food from West Sumatra</p>
                    </div>
                </div>
                <div class="culinary-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-4 aspect-h-3">
                        <img src="{{ asset('images/satay.webp') }}" class="w-full h-full object-cover" alt="Satay">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Satay</h3>
                        <p class="text-gray-600">Grilled skewered meat with peanut sauce</p>
                    </div>
                </div>
                <div class="culinary-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-4 aspect-h-3">
                        <img src="{{ asset('images/nasi-goreng.webp') }}" class="w-full h-full object-cover" alt="Nasi Goreng">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Nasi Goreng</h3>
                        <p class="text-gray-600">Indonesian signature fried rice</p>
                    </div>
                </div>
                <div class="culinary-card rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="overflow-hidden aspect-w-4 aspect-h-3">
                        <img src="{{ asset('images/gado-gado.webp') }}" class="w-full h-full object-cover" alt="Gado-gado">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Gado-gado</h3>
                        <p class="text-gray-600">Traditional vegetable salad with peanut sauce</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Upcoming Events</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Join us in celebrating Indonesian culture and traditions</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="event-card border-2 rounded-xl p-8 bg-white">
                    <div class="text-indonesia-red font-bold text-lg mb-3">AUG 17, 2024</div>
                    <h3 class="font-bold text-2xl mb-3">Independence Day Celebration</h3>
                    <p class="text-gray-600 mb-6">National celebration across Indonesia</p>
                    <a href="#" class="inline-flex items-center text-indonesia-red font-medium hover:text-red-700">
                        Learn more
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="event-card border-2 rounded-xl p-8 bg-white">
                    <div class="text-indonesia-red font-bold text-lg mb-3">SEP 20, 2024</div>
                    <h3 class="font-bold text-2xl mb-3">Jakarta Fashion Week</h3>
                    <p class="text-gray-600 mb-6">Southeast Asia's biggest fashion event</p>
                    <a href="#" class="inline-flex items-center text-indonesia-red font-medium hover:text-red-700">
                        Learn more
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="event-card border-2 rounded-xl p-8 bg-white">
                    <div class="text-indonesia-red font-bold text-lg mb-3">OCT 15, 2024</div>
                    <h3 class="font-bold text-2xl mb-3">Ubud Food Festival</h3>
                    <p class="text-gray-600 mb-6">Celebrating Indonesian culinary heritage</p>
                    <a href="#" class="inline-flex items-center text-indonesia-red font-medium hover:text-red-700">
                        Learn more
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-12">
                <div>
                    <h4 class="font-bold text-xl mb-6">About</h4>
                    <p class="text-gray-400 leading-relaxed">Wonderful Indonesia is the official tourism brand of Indonesia, promoting the country's beautiful destinations.</p>
                </div>
                <div>
                    <h4 class="font-bold text-xl mb-6">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Destinations</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Plan Your Trip</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Travel Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-xl mb-6">Contact</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@indonesia.travel
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +62 21 123456
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-xl mb-6">Follow Us</h4>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 sm:mt-12 pt-6 sm:pt-8 text-center text-gray-400">
                <p>&copy; 2024 Wonderful Indonesia. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
