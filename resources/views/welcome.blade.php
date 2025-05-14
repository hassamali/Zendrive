<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyZenDrive - Rent A Car</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

<!-- Header -->
<header class="bg-blue-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">MyZenDrive</h1>
        <nav>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-blue-200">Home</a></li>
                <li><a href="#book" class="hover:text-blue-200">Book Now</a></li>
                <li><a href="#contact" class="hover:text-blue-200">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Form Section -->
<section class="bg-blue-50 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">
        <div class="p-8 flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4 text-blue-600">Drive Your Dreams</h1>
            <p class="text-gray-600 mb-6">Book your perfect ride in minutes with MyZenDrive.</p>
            <form method="POST" action="{{ route('booking.submit') }}" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <input type="text" name="phone" placeholder="Phone Number" required class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-500 transition">Book Now</button>
            </form>
        </div>
        <div class="hidden md:block">
            <img src="https://source.unsplash.com/600x800/?luxury-car" alt="Car Rental" class="h-full w-full object-cover">
        </div>
    </div>
</section>

<!-- Booking Options -->
<section class="container mx-auto py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold mb-4 text-blue-600">One-Time Drop</h3>
            <p>Book a one-way trip easily and affordably.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold mb-4 text-blue-600">Return Booking</h3>
            <p>Plan your return journey with flexibility.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold mb-4 text-blue-600">City to City Trips</h3>
            <p>Travel between cities comfortably and safely.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold mb-4 text-blue-600">Northern Area Booking</h3>
            <p>Explore beautiful northern destinations with ease.</p>
        </div>
    </div>
</section>
