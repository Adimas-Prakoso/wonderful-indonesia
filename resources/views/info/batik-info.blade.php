<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traditional Batik - Wonderful Indonesia</title>
    @vite(['resources/css/batik-info/app.css', 'resources/js/batik-info/app.js'])
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

    <div x-data="batikInfo" x-init="init()" class="pt-20">
        <!-- Hero Section dengan Gambar -->
        <div class="relative h-[60vh]">
            <img 
                :src="batikImage" 
                :alt="batikName"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <div class="container mx-auto">
                    <h1 class="text-4xl font-bold text-white mb-2" x-text="batik?.name || 'Loading...'"></h1>
                    <p class="text-xl text-white/90" x-text="batik?.provinsi || 'Indonesia'"></p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-4xl mx-auto space-y-8">
                <!-- History -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">History</h2>
                    <template x-if="!history">
                        <div class="flex items-center space-x-2">
                            <div class="animate-spin rounded-full h-4 w-4 border-2 border-purple-500 border-t-transparent"></div>
                            <span class="text-gray-600">Generating historical information...</span>
                        </div>
                    </template>
                    <div class="prose max-w-none" x-show="history" x-html="history"></div>
                </div>

                <!-- Characteristics -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Characteristics</h2>
                    <template x-if="!characteristics">
                        <div class="flex items-center space-x-2">
                            <div class="animate-spin rounded-full h-4 w-4 border-2 border-purple-500 border-t-transparent"></div>
                            <span class="text-gray-600">Analyzing pattern characteristics...</span>
                        </div>
                    </template>
                    <div class="prose max-w-none" x-show="characteristics" x-html="characteristics"></div>
                </div>

                <!-- Philosophy -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Philosophy & Symbolism</h2>
                    <template x-if="!philosophy">
                        <div class="flex items-center space-x-2">
                            <div class="animate-spin rounded-full h-4 w-4 border-2 border-purple-500 border-t-transparent"></div>
                            <span class="text-gray-600">Exploring cultural meanings...</span>
                        </div>
                    </template>
                    <div class="prose max-w-none" x-show="philosophy" x-html="philosophy"></div>
                </div>

                <!-- Usage -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Usage & Applications</h2>
                    <template x-if="!usage">
                        <div class="flex items-center space-x-2">
                            <div class="animate-spin rounded-full h-4 w-4 border-2 border-purple-500 border-t-transparent"></div>
                            <span class="text-gray-600">Discovering traditional uses...</span>
                        </div>
                    </template>
                    <div class="prose max-w-none" x-show="usage" x-html="usage"></div>
                </div>

                <!-- Gallery -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Gallery</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <template x-for="(image, index) in supportingImages" :key="index">
                            <div class="relative aspect-ratio-4-3 rounded-lg overflow-hidden">
                                <img 
                                    :src="image" 
                                    :alt="batik ? batik.name + ' pattern ' + (index + 1) : 'Batik pattern'"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        </template>
                    </div>
                </div>
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
