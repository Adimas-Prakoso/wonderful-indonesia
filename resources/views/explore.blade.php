<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore - Wonderful Indonesia</title>
    @vite('resources/css/explore/app.css')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/wonderful-indonesia-logo.png') }}" alt="Wonderful Indonesia" class="h-12">
                </a>
                <div class="space-x-8">
                    <a href="/" class="relative group text-gray-700 hover:text-red-600 transition-colors duration-300">
                        <span class="text-lg font-medium">Home</span>
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
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
                        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M38.562 286.54h201.905v124.25H38.562z" style="" fill="#ffb272" data-original="#ffb272" class=""></path><path d="M38.562 286.54h30v124.25h-30z" style="" fill="#d38a54" data-original="#d38a54" class=""></path><path d="M271.53 286.54h201.905v124.25H271.53z" style="" fill="#ffb272" data-original="#ffb272" class=""></path><path d="M271.53 286.54h30v124.25h-30z" style="" fill="#d38a54" data-original="#d38a54" class=""></path><path d="M7.5 255.477h31.062v186.374H7.5zM240.468 255.477h31.062v186.374h-31.062zM473.436 255.477h31.062v186.374h-31.062z" style="" fill="#fd4755" data-original="#fd4755"></path><path d="M193.874 286.54H85.156l-11.05-37.085a31.002 31.002 0 0 1 4.986-27.555l12.292-16.249a31.001 31.001 0 0 1 24.723-12.298h46.816a30.998 30.998 0 0 1 24.723 12.298l12.292 16.249a31.002 31.002 0 0 1 4.986 27.555l-11.05 37.085z" style="" fill="#fed402" data-original="#fed402"></path><path d="m109.092 221.9 12.292-16.249a31.001 31.001 0 0 1 24.723-12.298h-30a30.998 30.998 0 0 0-24.723 12.298L79.092 221.9a31.002 31.002 0 0 0-4.986 27.555l11.05 37.085h30l-11.05-37.085a31.001 31.001 0 0 1 4.986-27.555zM160.046 193.353h-41.062v-10.531c0-11.339 9.192-20.531 20.531-20.531 11.339 0 20.531 9.192 20.531 20.531v10.531zM393.014 224.415h-41.062v-10.531c0-11.339 9.192-20.531 20.531-20.531 11.339 0 20.531 9.192 20.531 20.531v10.531z" style="" fill="#fac600" data-original="#fac600"></path><path d="M426.842 286.54H318.124l-10.872-43.487c-2.367-9.467 4.794-18.638 14.552-18.638h101.357c9.759 0 16.919 9.171 14.552 18.638l-10.871 43.487z" style="" fill="#fed402" data-original="#fed402"></path><path d="M351.804 224.415h-30c-9.759 0-16.919 9.171-14.552 18.638l10.872 43.487h30l-10.872-43.487c-2.367-9.467 4.794-18.638 14.552-18.638z" style="" fill="#fac600" data-original="#fac600"></path><path d="m373.963 150.59-31.483-8.436a7 7 0 0 1-4.95-8.573l8.436-31.483a7 7 0 0 1 8.573-4.95l31.483 8.436a7 7 0 0 1 4.95 8.573l-8.436 31.483a6.998 6.998 0 0 1-8.573 4.95z" style="" fill="#adb9c8" data-original="#adb9c8"></path><path d="M367.481 142.155a7 7 0 0 1-4.95-8.573l8.436-31.483a6.91 6.91 0 0 1 .156-.506L354.54 97.15a6.999 6.999 0 0 0-8.573 4.95l-8.436 31.483a6.999 6.999 0 0 0 4.95 8.573l31.483 8.436a7 7 0 0 0 8.417-4.443l-14.9-3.994z" style="" fill="#92a2b5" data-original="#92a2b5"></path><path d="m337.729 132.842-120.016-32.158c-8.285-2.22-13.202-10.736-10.982-19.022 2.22-8.285 10.736-13.202 19.022-10.982l120.016 32.158-8.04 30.004z" style="" fill="#ffb272" data-original="#ffb272" class=""></path><path d="M247.713 100.684c-8.285-2.22-13.202-10.736-10.982-19.022a15.46 15.46 0 0 1 4.018-6.964l-14.996-4.018c-8.285-2.22-16.802 2.697-19.022 10.982s2.697 16.802 10.982 19.022l120.016 32.158 2.01-7.5-92.026-24.658z" style="" fill="#d38a54" data-original="#d38a54" class=""></path><path d="M95.586 304.736h87.858v87.858H95.586z" style="" transform="rotate(45.001 139.52 348.664)" fill="#af6a3a" data-original="#af6a3a" class=""></path><path d="M328.554 304.736h87.858v87.858h-87.858z" style="" transform="rotate(45.001 372.489 348.662)" fill="#af6a3a" data-original="#af6a3a" class=""></path><circle cx="139.515" cy="348.664" r="15.531" style="" fill="#8c5835" data-original="#8c5835"></circle><circle cx="372.483" cy="348.664" r="15.531" style="" fill="#8c5835" data-original="#8c5835"></circle><path d="M210.219 410.79h30.25V286.539H38.558V410.79h138.971M271.53 286.54h201.905v124.25H271.53z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><path d="M7.5 255.477h31.062v186.374H7.5zM240.468 255.477h31.062v186.374h-31.062zM504.5 365.01v76.84h-31.06V255.479h31.06v76.84M193.874 286.54H85.156l-11.05-37.085a31.002 31.002 0 0 1 4.986-27.555l12.292-16.249a31.001 31.001 0 0 1 24.723-12.298h46.816a30.998 30.998 0 0 1 24.723 12.298l12.292 16.249a31.002 31.002 0 0 1 4.986 27.555l-11.05 37.085zM160.046 193.353h-41.062v-10.531c0-11.339 9.192-20.531 20.531-20.531h0c11.339 0 20.531 9.192 20.531 20.531v10.531zM393.014 224.415h-41.062v-10.531c0-11.339 9.192-20.531 20.531-20.531h0c11.339 0 20.531 9.192 20.531 20.531v10.531zM72.833 239.946h133.365M426.842 286.54H318.124l-10.872-43.487c-2.367-9.467 4.794-18.638 14.552-18.638h101.357c9.759 0 16.919 9.171 14.552 18.638l-10.871 43.487zM373.963 150.59l-31.483-8.436a7 7 0 0 1-4.95-8.573l8.436-31.483a7 7 0 0 1 8.573-4.95l31.483 8.436a7 7 0 0 1 4.95 8.573l-8.436 31.483a6.998 6.998 0 0 1-8.573 4.95z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><path d="m307.469 92.579 38.3 10.26-8.04 30-120.02-32.15c-8.28-2.22-13.2-10.74-10.98-19.03 1.86-6.93 8.14-11.51 14.99-11.51 1.33 0 2.68.17 4.03.53l50.14 13.44" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><circle cx="139.515" cy="348.664" r="15.531" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></circle><path d="M95.586 304.736h87.858v87.858H95.586z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" transform="rotate(45.001 139.52 348.664)" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><path d="M69.625 317.602h0M69.625 379.727h0M209.405 317.602h0M209.405 379.727h0" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><circle cx="372.483" cy="348.664" r="15.531" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></circle><path d="M328.554 304.736h87.858v87.858h-87.858z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" transform="rotate(45.001 372.489 348.662)" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path><path d="M302.593 317.602h0M302.593 379.727h0M442.373 317.602h0M442.373 379.727h0" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000" class=""></path></g></svg>'
                    ],
                    [
                        'title' => 'Food',
                        'link' => '/food',
                        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M266 217.689c0 3.861-1.021 7.665-2.95 10.999l-.29.501.29.501a21.754 21.754 0 0 1 2.813 8.644l.125 1.174 1.138-.317a27.52 27.52 0 0 1 7.374-1.001c8.403 0 16.236 3.774 21.492 10.354l.355.445.565-.079a22.299 22.299 0 0 1 3.087-.221c4.888 0 9.518 1.573 13.391 4.55l.609.468.609-.468c3.873-2.977 8.503-4.55 13.391-4.55s9.518 1.573 13.391 4.55l1.609 1.237v-33.787c0-2.206 1.794-4 4-4h8.651c-1.71-9.966-9.645-18.148-20.193-19.685a24.083 24.083 0 0 0-5.037-.2c.029-.174.064-.345.089-.521 1.912-13.116-7.172-25.299-20.288-27.21-12.358-1.801-23.883 6.159-26.774 18.055a23.893 23.893 0 0 0-10.601-4.302c-10.587-1.543-20.562 4.08-25.022 13.203 10.314 1.817 18.176 10.834 18.176 21.66z" style="" fill="#c86d36" data-original="#c86d36"></path><path d="M335.458 197.003a24.083 24.083 0 0 0-5.037-.2c.029-.174.064-.345.09-.521 1.912-13.116-7.172-25.299-20.288-27.21-9.458-1.378-18.422 2.965-23.408 10.41a23.886 23.886 0 0 1 10.757-.886c13.116 1.912 22.2 14.094 20.288 27.21-.026.175-.06.347-.089.521a24.083 24.083 0 0 1 5.037.2c10.548 1.537 18.482 9.719 20.193 19.685v-5.524c0-2.206 1.794-4 4-4h8.651c-1.711-9.966-9.646-18.147-20.194-19.685z" style="" fill="#ac5e2e" data-original="#ac5e2e"></path><path d="M355.438 215.689c-2.056-9.507-9.789-17.2-19.98-18.685a24.083 24.083 0 0 0-5.037-.2c.029-.174.064-.345.09-.521 1.912-13.116-7.172-25.299-20.288-27.21-12.358-1.801-23.883 6.159-26.774 18.055a23.893 23.893 0 0 0-10.601-4.302c-10.219-1.489-19.853 3.708-24.522 12.275" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M178.881 235.042c2.007 2.008 3.113 4.678 3.113 7.517s-1.106 5.508-3.113 7.516l-4.455 4.457 3.669-1.024a21.98 21.98 0 0 1 5.905-.818 21.79 21.79 0 0 1 13.391 4.55l.609.468.609-.468A21.788 21.788 0 0 1 212 252.69c.143 0 .285.005.427.01l.817.022.296-.524c4.876-8.641 14.057-14.008 23.96-14.008a27.501 27.501 0 0 1 17.85 6.59l.65.556.649-.555a27.5 27.5 0 0 1 10.303-5.518 22.873 22.873 0 0 0-3.037-10.073 22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.892 22.892 0 0 0-14 4.757c-3.878-2.981-8.731-4.757-14-4.757s-10.122 1.776-14 4.757a22.892 22.892 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 1.296.12 2.562.327 3.8l13.554 13.552z" style="" fill="#c86d36" data-original="#c86d36"></path><path d="M267 217.689c0-12.703-10.297-23-23-23-3.579 0-6.956.835-9.976 2.295 7.68 3.725 12.976 11.596 12.976 20.705 0 4.191-1.126 8.116-3.085 11.5a22.877 22.877 0 0 1 3.037 10.073c-.323.092-.641.198-.96.302 3.405 1.109 6.596 2.855 9.358 5.215l.65.556.649-.555a27.5 27.5 0 0 1 10.303-5.518 22.873 22.873 0 0 0-3.037-10.073 22.878 22.878 0 0 0 3.085-11.5z" style="" fill="#ac5e2e" data-original="#ac5e2e"></path><path d="M266.858 238.227a22.847 22.847 0 0 0-2.943-9.038 22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.892 22.892 0 0 0-14 4.757c-3.878-2.981-8.731-4.757-14-4.757s-10.122 1.776-14 4.757a22.892 22.892 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 .736.047 1.46.119 2.177" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M210.896 308.911h90.207a28.41 28.41 0 0 0 1.896-10.223 28.36 28.36 0 0 0-5.269-16.5 28.36 28.36 0 0 0 5.269-16.5c0-15.74-12.76-28.5-28.5-28.5a28.378 28.378 0 0 0-18.5 6.83 28.378 28.378 0 0 0-18.5-6.83c-15.74 0-28.5 12.76-28.5 28.5a28.36 28.36 0 0 0 5.269 16.5 28.36 28.36 0 0 0-5.269 16.5 28.45 28.45 0 0 0 1.897 10.223z" style="" fill="#fe7d43" data-original="#fe7d43"></path><path d="M296.774 247.919c-5.222-6.537-13.256-10.73-22.274-10.73a28.378 28.378 0 0 0-18.5 6.83 28.378 28.378 0 0 0-18.5-6.83c-10.657 0-19.942 5.853-24.831 14.517" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M356 248.689c8.191 0 15.654 4.51 19.477 11.771l.402.765.814-.287A21.948 21.948 0 0 1 384 259.69c4.888 0 9.518 1.573 13.391 4.55l.609.468.609-.468A21.788 21.788 0 0 1 412 259.69c.336 0 .667.026 1 .04v-39.04a5 5 0 0 0-5-5h-61a5 5 0 0 0-5 5v33.018l.609-.468A21.783 21.783 0 0 1 356 248.689z" style="" fill="#ffe177" data-original="#ffe177"></path><path d="M408 215.689h-20a5 5 0 0 1 5 5v40.926a21.92 21.92 0 0 1 4.391 2.623l.609.468.609-.468a21.788 21.788 0 0 1 13.391-4.55c.336 0 .667.026 1 .04v-39.04a5 5 0 0 0-5-4.999z" style="" fill="#ffd15b" data-original="#ffd15b"></path><path d="M356 248.689c8.191 0 15.654 4.51 19.477 11.771l.402.765.814-.287A21.948 21.948 0 0 1 384 259.69c4.888 0 9.518 1.573 13.391 4.55l.609.468.609-.468A21.788 21.788 0 0 1 412 259.69c.336 0 .667.026 1 .04v-39.04a5 5 0 0 0-5-5h-61a5 5 0 0 0-5 5v33.018l.609-.468A21.783 21.783 0 0 1 356 248.689z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m142.827 255.589.443 1.122 1.02-.644a21.933 21.933 0 0 1 11.709-3.379 21.79 21.79 0 0 1 13.391 4.55l.609.468.609-.468a21.949 21.949 0 0 1 5.66-3.138l3.319-3.319c4.542-4.542 4.542-11.905 0-16.446l-17.495-17.495c-4.542-4.542-11.905-4.542-16.446 0l-17.495 17.495a11.57 11.57 0 0 0-2.953 5.018c7.925 2.369 14.463 8.224 17.629 16.236z" style="" fill="#ffe177" data-original="#ffe177"></path><path d="m179.588 234.336-17.495-17.495c-4.542-4.542-11.905-4.542-16.446 0l-2.274 2.274 15.221 15.221c4.542 4.542 4.542 11.905 0 16.446l-1.934 1.934c4.642.136 9.033 1.682 12.73 4.523l.609.468.609-.468a21.949 21.949 0 0 1 5.66-3.138l3.319-3.319c4.543-4.542 4.543-11.905.001-16.446z" style="" fill="#ffd15b" data-original="#ffd15b"></path><path d="M170 256.446a22.938 22.938 0 0 1 7.826-3.902l1.762-1.762c4.542-4.542 4.542-11.905 0-16.446l-17.495-17.495c-4.542-4.542-11.905-4.542-16.446 0l-17.495 17.495a11.53 11.53 0 0 0-2.621 4.079" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M361.393 308.911h101.213c.254-1.37.394-2.78.394-4.223 0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.89 22.89 0 0 0-14 4.757c-3.878-2.981-8.73-4.757-14-4.757s-10.122 1.776-14 4.757a22.89 22.89 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 4.191 1.126 8.116 3.085 11.5a22.888 22.888 0 0 0-3.085 11.5c0 1.444.139 2.854.393 4.223z" style="" fill="#fe7d43" data-original="#fe7d43"></path><path d="M463 281.689c0-12.703-10.297-23-23-23-3.579 0-6.957.835-9.976 2.295 7.68 3.725 12.976 11.596 12.976 20.705 0 4.191-1.126 8.116-3.085 11.5a22.888 22.888 0 0 1 3.085 11.5 23.05 23.05 0 0 1-.394 4.223h20c.254-1.37.394-2.78.394-4.223 0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5z" style="" fill="#fd6930" data-original="#fd6930"></path><path d="M462.747 307.912c.15-1.055.253-2.126.253-3.223 0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.89 22.89 0 0 0-14 4.757c-3.878-2.981-8.73-4.757-14-4.757s-10.122 1.776-14 4.757a22.89 22.89 0 0 0-14-4.757c-2.679 0-5.248.463-7.639 1.305" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M135.925 308.911h96.15A22.89 22.89 0 0 0 235 297.688c0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.892 22.892 0 0 0-14 4.757 22.892 22.892 0 0 0-14-4.757 22.892 22.892 0 0 0-14 4.757 22.892 22.892 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 4.191 1.126 8.116 3.085 11.5a22.888 22.888 0 0 0-3.085 11.5 22.89 22.89 0 0 0 2.925 11.223z" style="" fill="#d77f4a" data-original="#d77f4a"></path><path d="M235 274.689c0-12.703-10.297-23-23-23a22.854 22.854 0 0 0-11.982 3.388c6.587 4.045 10.982 11.314 10.982 19.612 0 4.191-1.126 8.116-3.085 11.5a22.888 22.888 0 0 1 3.085 11.5c0 4.076-1.065 7.902-2.925 11.223h24A22.89 22.89 0 0 0 235 297.689c0-4.191-1.126-8.116-3.085-11.5a22.878 22.878 0 0 0 3.085-11.5z" style="" fill="#c86d36" data-original="#c86d36"></path><path d="M234.442 279.689a22.94 22.94 0 0 0 .558-5c0-12.703-10.297-23-23-23a22.892 22.892 0 0 0-14 4.757c-3.878-2.981-8.731-4.757-14-4.757s-10.122 1.776-14 4.757a22.892 22.892 0 0 0-14-4.757 22.884 22.884 0 0 0-12.243 3.533" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M282.765 308.911h90.469a22.91 22.91 0 0 0 5.765-15.223c0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.89 22.89 0 0 0-14 4.757c-3.878-2.981-8.73-4.757-14-4.757s-10.122 1.776-14 4.757a22.892 22.892 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 4.191 1.126 8.116 3.085 11.5a22.888 22.888 0 0 0-3.085 11.5 22.913 22.913 0 0 0 5.766 15.223z" style="" fill="#d77f4a" data-original="#d77f4a"></path><path d="M379 270.689c0-12.703-10.297-23-23-23a22.856 22.856 0 0 0-13.095 4.117c5.967 4.155 9.875 11.061 9.875 18.883 0 4.191-1.126 8.116-3.085 11.5a22.888 22.888 0 0 1 3.085 11.5 22.91 22.91 0 0 1-5.765 15.223h26.221a22.91 22.91 0 0 0 5.765-15.223c0-4.191-1.126-8.116-3.085-11.5a22.897 22.897 0 0 0 3.084-11.5z" style="" fill="#c86d36" data-original="#c86d36"></path><path d="M374.043 307.912c3.092-3.916 4.957-8.846 4.957-14.223 0-4.191-1.126-8.116-3.085-11.5a22.888 22.888 0 0 0 3.085-11.5c0-12.703-10.297-23-23-23a22.89 22.89 0 0 0-14 4.757c-3.878-2.981-8.73-4.757-14-4.757s-10.122 1.776-14 4.757a22.892 22.892 0 0 0-14-4.757c-12.703 0-23 10.297-23 23 0 4.191 1.126 8.116 3.085 11.5a22.888 22.888 0 0 0-3.085 11.5c0 5.377 1.864 10.307 4.957 14.223" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m260.076 308.911-15.428-26.723a5 5 0 0 0-4.33-2.5h-25.539a5 5 0 0 0-4.33 2.5l-15.428 26.723h65.055z" style="" fill="#ffe177" data-original="#ffe177"></path><path d="M244.648 282.189a5 5 0 0 0-4.33-2.5h-20.077a5 5 0 0 1 4.33 2.5L240 308.911h20.076l-15.428-26.722z" style="" fill="#ffd15b" data-original="#ffd15b"></path><path d="m259.499 307.912-14.851-25.723a5 5 0 0 0-4.33-2.5h-25.539a5 5 0 0 0-4.33 2.5l-14.851 25.723h63.901z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M53.646 308.911h90.207a28.41 28.41 0 0 0 1.896-10.223 28.36 28.36 0 0 0-5.269-16.5 28.36 28.36 0 0 0 5.269-16.5c0-15.74-12.76-28.5-28.5-28.5a28.378 28.378 0 0 0-18.5 6.83 28.378 28.378 0 0 0-18.5-6.83c-15.74 0-28.5 12.76-28.5 28.5a28.36 28.36 0 0 0 5.269 16.5 28.36 28.36 0 0 0-5.269 16.5 28.45 28.45 0 0 0 1.897 10.223z" style="" fill="#fe7d43" data-original="#fe7d43"></path><path d="M145.75 265.689c0-15.74-12.76-28.5-28.5-28.5a28.332 28.332 0 0 0-15.373 4.51c7.891 5.068 13.123 13.915 13.123 23.99a28.36 28.36 0 0 1-5.269 16.5 28.36 28.36 0 0 1 5.269 16.5c0 3.604-.676 7.048-1.896 10.223h30.75a28.41 28.41 0 0 0 1.896-10.223 28.36 28.36 0 0 0-5.269-16.5 28.36 28.36 0 0 0 5.269-16.5z" style="" fill="#fd6930" data-original="#fd6930"></path><path d="M144.213 307.912a28.406 28.406 0 0 0 1.537-9.223 28.36 28.36 0 0 0-5.269-16.5 28.36 28.36 0 0 0 5.269-16.5c0-15.74-12.76-28.5-28.5-28.5a28.378 28.378 0 0 0-18.5 6.83 28.378 28.378 0 0 0-18.5-6.83c-.414 0-.825.014-1.235.031M52.341 259.894a28.654 28.654 0 0 0-.591 5.794c0 3.655.704 7.14 1.96 10.349" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M33.022 308.911h55.697l2.557-2.557a5 5 0 0 0 0-7.071l-26.87-26.87a5 5 0 0 0-7.071 0l-26.87 26.87a5 5 0 0 0 0 7.071l2.557 2.557z" style="" fill="#ffe177" data-original="#ffe177"></path><path d="m91.276 299.283-26.87-26.87a5 5 0 0 0-7.071 0l-6.964 6.964 19.906 19.906a5 5 0 0 1 0 7.071l-2.557 2.557h21l2.557-2.557a5.002 5.002 0 0 0-.001-7.071z" style="" fill="#ffd15b" data-original="#ffd15b"></path><path d="M32.022 307.912h57.696l1.557-1.557a5 5 0 0 0 0-7.071l-26.87-26.87a5 5 0 0 0-7.071 0l-26.87 26.87a5 5 0 0 0 0 7.071l1.558 1.557z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="M504.494 313.105c.132-2.834-2.166-5.193-5.003-5.193H12.509c-2.837 0-5.136 2.359-5.003 5.193 2.549 54.604 45.089 98.751 98.995 103.829v25.755c0 5.523 4.477 10 10 10h279c5.523 0 10-4.477 10-10v-25.755c53.905-5.078 96.444-49.225 98.993-103.829z" style="" fill="#dff6fd" data-original="#dff6fd"></path><path d="M499.491 307.912h-50.5c2.837 0 5.136 2.359 5.003 5.193-2.549 54.604-45.089 98.751-98.995 103.829v25.755c0 5.523-4.477 10-10 10h50.5c5.523 0 10-4.477 10-10v-25.755c53.906-5.078 96.445-49.225 98.995-103.829.133-2.834-2.166-5.193-5.003-5.193z" style="" fill="#c8effe" data-original="#c8effe"></path><path d="M106.5 416.934v25.755c0 5.523 4.477 10 10 10h279c5.523 0 10-4.477 10-10v-25.755h-299z" style="" fill="#c8effe" data-original="#c8effe"></path><path d="M345.002 452.689H395.5c5.523 0 10-4.477 10-10v-25.755H355v25.755c0 5.522-4.476 9.998-9.998 10z" style="" fill="#99e6fc" data-original="#99e6fc"></path><path d="M305 307.912H12.509c-2.837 0-5.136 2.359-5.003 5.193 2.549 54.604 45.089 98.751 98.995 103.829v25.755c0 5.523 4.477 10 10 10h279c5.523 0 10-4.477 10-10v-25.755c53.906-5.078 96.445-49.225 98.995-103.829.132-2.834-2.166-5.193-5.003-5.193H340M103 271.689h7M204 221.689h7M307 276.689h7M344 282.689h7M384 235.689h7M292 204.689h7M313 222.739l4.95 4.95M318 115.689h7M172 281.689h7M423 287.689h7M431.05 189.689l4.95 4.95M226.05 146.689l4.95 4.95M116 174.689l4.95-4.95" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m416.81 127.592-26.721 26.721c-1.694 1.694-4.593.817-5.063-1.533l-5.657-28.284a3 3 0 0 1 .82-2.71l26.721-26.721c1.694-1.694 4.593-.817 5.063 1.533l5.657 28.284a3 3 0 0 1-.82 2.71z" style="" fill="#fe7d43" data-original="#fe7d43"></path><path d="m416.81 127.592-26.721 26.721c-1.694 1.694-4.593.817-5.063-1.533l-5.657-28.284a3 3 0 0 1 .82-2.71l26.721-26.721c1.694-1.694 4.593-.817 5.063 1.533l5.657 28.284a3 3 0 0 1-.82 2.71z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m74.121 189.033-19.775 19.775c-1.694 1.694-4.593.817-5.063-1.533l-4.113-20.566a3 3 0 0 1 .82-2.71l19.775-19.775c1.694-1.694 4.593-.817 5.063 1.533l4.113 20.566a2.997 2.997 0 0 1-.82 2.71z" style="" fill="#fe7d43" data-original="#fe7d43"></path><path d="m74.121 189.033-19.775 19.775c-1.694 1.694-4.593.817-5.063-1.533l-4.113-20.566a3 3 0 0 1 .82-2.71l19.775-19.775c1.694-1.694 4.593-.817 5.063 1.533l4.113 20.566a2.997 2.997 0 0 1-.82 2.71z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m140.69 124.592 26.721 26.721c1.694 1.694 4.593.817 5.063-1.533l5.657-28.284a3 3 0 0 0-.82-2.71L150.59 92.065c-1.694-1.694-4.593-.817-5.063 1.533l-5.657 28.284a3 3 0 0 0 .82 2.71z" style="" fill="#bbec6c" data-original="#bbec6c"></path><path d="m140.69 124.592 26.721 26.721c1.694 1.694 4.593.817 5.063-1.533l5.657-28.284a3 3 0 0 0-.82-2.71L150.59 92.065c-1.694-1.694-4.593-.817-5.063 1.533l-5.657 28.284a3 3 0 0 0 .82 2.71z" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path><path d="m248.602 96.81-26.721-26.721c-1.694-1.694-.817-4.593 1.533-5.063l28.284-5.657a3 3 0 0 1 2.71.82l26.721 26.721c1.694 1.694.817 4.593-1.533 5.063l-28.284 5.657a3 3 0 0 1-2.71-.82z" style="" fill="#bbec6c" data-original="#bbec6c"></path><path d="m248.602 96.81-26.721-26.721c-1.694-1.694-.817-4.593 1.533-5.063l28.284-5.657a3 3 0 0 1 2.71.82l26.721 26.721c1.694 1.694.817 4.593-1.533 5.063l-28.284 5.657a3 3 0 0 1-2.71-.82zM68 341v17M115 341v17M162 341v17M209 341v17M256 341v17M303 341v17M350 341v17M397 341v17M444 341v17M168 416.934h-61.5M405.5 416.934H203" style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"></path></g></svg>'
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
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
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
