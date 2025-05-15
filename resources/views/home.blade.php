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

    <section>
        <div x-data="{ mainForm: 'car' }">
            <div class="flex items-center space-x-4 mb-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="mainForm" value="car" x-model="mainForm">
                    <span>Car Rental</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="mainForm" value="from" x-model="mainForm">
                    <span>Airport Shuttle (From Airport)</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="mainForm" value="to" x-model="mainForm">
                    <span>Airport Shuttle (To Airport)</span>
                </label>
            </div>

            <form>
                <div x-show="mainForm === 'car'">
                    @include('components.forms.car-rental')
                </div>
                <div x-show="mainForm === 'from'">
                    @include('components.forms.airport-from')
                </div>
                <div x-show="mainForm === 'to'">
                    @include('components.forms.airport-to')
                </div>

                <div class="text-right mt-4">
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-sm font-semibold px-6 py-2 rounded">Search</button>
                </div>
            </form>
        </div>

    </section>

    <script>
        function initFlatpickr() {
            flatpickr("[x-ref$='Date']", {
                dateFormat: "Y-m-d",
                minDate: "today"
            });
            flatpickr("[x-ref$='Time']", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
        }
    </script>


</body>
</html>
