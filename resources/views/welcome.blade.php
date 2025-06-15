<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zendrive Car Rental</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="bg-white text-gray-800 min-h-screen flex flex-col">

    {{-- Sticky Top Bar --}}
    <div class="bg-blue-600 text-white text-sm py-1 px-4 sticky top-0 z-50 shadow">
        <div class="max-w-5xl mx-auto text-center">
            Limited time offer! Get 10% off on all bookings this week.
        </div>
    </div>

    {{-- Header --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between">
            {{-- Logo --}}
            <div class="text-xl font-bold text-gray-700">
                <a href="{{ url('/') }}">Zendrive</a>
            </div>

            {{-- Navigation --}}
            <nav class="flex flex-wrap items-center space-x-4 text-sm text-gray-700 mt-2 sm:mt-0">
                <a href="{{ url('/') }}" class="hover:text-red-600 font-medium">Home</a>
                <a href="#" class="hover:text-red-600 font-medium">About</a>
                <a href="#" class="hover:text-red-600 font-medium">Contact</a>
            </nav>

            {{-- Contact Info --}}
            <div class="text-xs text-gray-500 mt-2 sm:mt-0">
                <span class="font-medium">Call Us:</span> +92 333 9002222
            </div>
        </div>
    </header>

    {{-- Booking Forms --}}
    <section class="bg-blue-600 py-8 text-white">
        <div class="max-w-5xl mx-auto px-4" x-data="{ selectedForm: 'intracity' }"
            x-init="$nextTick(() => window.initFlatpickr($refs))"
            x-effect="$nextTick(() => window.initFlatpickr($refs))">
            <!-- Toggle buttons -->
            <div class="flex space-x-6 mb-6">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="car_type" value="intracity" x-model="selectedForm" class="text-blue-600">
                    <span>IntraCity</span>
                </label>
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="car_type" value="intercity" x-model="selectedForm" class="text-blue-600">
                    <span>InterCity</span>
                </label>
            </div>

            <!-- Conditional form include -->
            <div x-show="selectedForm === 'intracity'" x-cloak>
                @include('components.forms.intracity')
            </div>

            <div x-show="selectedForm === 'intercity'" x-cloak>
                @include('components.forms.intercity')
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white text-sm py-8">
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <h3 class="font-semibold mb-2">Zendrive</h3>
                <p class="text-gray-400">Reliable car rentals for city and outstation travel. Easy booking and
                    competitive rates.</p>
            </div>
            <div>
                <h3 class="font-semibold mb-2">Quick Links</h3>
                <ul class="space-y-1">
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
