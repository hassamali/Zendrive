<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zendrive Car Rental') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 min-h-screen flex flex-col font-sans antialiased">

    {{-- Sticky Top Bar --}}
    <div class="bg-blue-600 text-white text-sm py-1 px-4 sticky top-0 z-50 shadow">
        <div class="max-w-5xl mx-auto text-center">
            Limited time offer! Get 10% off on all bookings this week.
        </div>
    </div>

    {{-- Header --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-600">Zendrive</div>
            <nav class="space-x-5 text-sm text-gray-700">
                <a href="{{ route('dashboard') }}" class="hover:text-red-600 font-medium">Dashboard</a>
                <a href="#" class="hover:text-red-600 font-medium">Cars</a>
                <a href="#" class="hover:text-red-600 font-medium">About</a>
                <a href="#" class="hover:text-red-600 font-medium">Contact</a>
            </nav>
            <div class="text-xs text-gray-500 hidden md:block">
                <span class="font-medium">Call Us:</span> +92 333 9002222
            </div>
        </div>
    </header>

    {{-- Page Content --}}
    <main class="flex-grow max-w-3xl mx-auto p-4">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white text-sm py-8 mt-10">
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <h3 class="font-semibold mb-2">Zendrive</h3>
                <p class="text-gray-400">
                    Reliable car rentals for city and outstation travel. Easy booking and competitive rates.
                </p>
            </div>
            <div>
                <h3 class="font-semibold mb-2">Quick Links</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('dashboard') }}" class="hover:text-red-500">Dashboard</a></li>
                    <li><a href="#" class="hover:text-red-500">Cars</a></li>
                    <li><a href="#" class="hover:text-red-500">About</a></li>
                    <li><a href="#" class="hover:text-red-500">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold mb-2">Contact</h3>
                <ul class="space-y-1 text-gray-400">
                    <li>Phone: +92 300 0000000</li>
                    <li>Email: support@zendrive.com</li>
                    <li>123 RentACar Rd, Islamabad</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold mb-2">Follow Us</h3>
                <div class="flex space-x-3 text-gray-400">
                    <a href="#" class="hover:text-red-500">Facebook</a>
                    <a href="#" class="hover:text-red-500">Instagram</a>
                    <a href="#" class="hover:text-red-500">Twitter</a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-6 pt-3 text-center text-gray-500 text-xs">
            &copy; 2025 Zendrive. All rights reserved.
        </div>
    </footer>

</body>

</html>
