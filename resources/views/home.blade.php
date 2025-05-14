<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyZendrive - Car Rentals</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow p-4">
        <h1 class="text-2xl font-bold text-center">MyZendrive - Rent Your Car Easily</h1>
    </header>

    <section class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        <div class="p-4 bg-blue-100 rounded">One Time Drop Booking</div>
        <div class="p-4 bg-green-100 rounded">Return Booking</div>
        <div class="p-4 bg-yellow-100 rounded">City to City Trips</div>
        <div class="p-4 bg-purple-100 rounded">Northern Area Booking</div>
    </section>

    <section class="p-6">
        <h2 class="text-xl font-semibold mb-4">Featured Cars</h2>
        <!-- Car Images Here -->
    </section>

    <section class="p-6">
        <h2 class="text-xl font-semibold mb-4">Book Your Ride</h2>
        <form action="/book" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            <input type="text" name="name" placeholder="Your Name" class="border p-2">
            <input type="text" name="phone" placeholder="Phone Number" class="border p-2">
            <input type="text" name="pickup" placeholder="Pickup Location" class="border p-2">
            <input type="text" name="dropoff" placeholder="Dropoff Location" class="border p-2">
            <input type="datetime-local" name="datetime" class="border p-2">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Book Now</button>
        </form>
    </section>

</body>
</html>
