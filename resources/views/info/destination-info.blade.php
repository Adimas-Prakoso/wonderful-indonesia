<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi - Wonderful Indonesia</title>
    @vite(['resources/css/destination-info/app.css', 'resources/js/destination-info/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.2.0/ol.css">
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
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 lg:space-x-12">
                
                </div>
            </div>
        </div>
    </nav>

    <div x-data="destinationInfo" x-init="init()" class="pt-20">
        <!-- Hero Section dengan Gambar -->
        <div class="relative h-[60vh]">
            <img 
                :src="destinationImage" 
                :alt="destinationName"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <div class="container mx-auto">
                    <h1 class="text-4xl font-bold text-white mb-2" x-text="destination?.name || 'Loading...'"></h1>
                    <p class="text-xl text-white/90" x-text="destination?.provinsi || 'Indonesia'"></p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Deskripsi -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">About Destination</h2>
                        <template x-if="!description">
                            <div class="flex items-center space-x-2">
                                <div class="animate-spin rounded-full h-4 w-4 border-2 border-blue-500 border-t-transparent"></div>
                                <span class="text-gray-600">AI Generating description...</span>
                            </div>
                        </template>
                        <div class="prose max-w-none" x-show="description" x-html="description"></div>
                    </div>

                    <!-- Peta -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Location</h2>
                        <div id="map" class="w-full h-[400px] rounded-lg"></div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Weather Card -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Current Weather</h2>
                        <template x-if="weather">
                            <div class="text-center">
                                <img :src="'https://openweathermap.org/img/wn/' + weather.icon + '@2x.png'" 
                                     :alt="weather.description" 
                                     class="mx-auto">
                                <div class="text-4xl font-bold mb-2" x-text="Math.round(weather.temp) + '°C'"></div>
                                <div class="text-gray-600 capitalize" x-text="weather.description"></div>
                                <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <div class="text-gray-500">Humidity</div>
                                        <div class="font-semibold" x-text="weather.humidity + '%'"></div>
                                    </div>
                                    <div>
                                        <div class="text-gray-500">Wind Speed</div>
                                        <div class="font-semibold" x-text="weather.windSpeed + ' m/s'"></div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Additional Info -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Additional Information</h2>
                        <div class="space-y-4">
                            <div>
                                <div class="text-gray-500">Coordinates</div>
                                <div class="font-semibold" x-text="coordinates.lat + ', ' + coordinates.lng"></div>
                            </div>
                            <div>
                                <div class="text-gray-500">Google Maps</div>
                                <div class="font-semibold">
                                    <a :href="'https://www.google.com/maps/search/' + encodeURIComponent(destination && destination.name || '')" 
                                       target="_blank" 
                                       class="text-blue-600 hover:text-blue-800">
                                        Open in Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>