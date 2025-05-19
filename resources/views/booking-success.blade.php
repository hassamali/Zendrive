@extends('layouts.app')

@section('content')
    <section
        class="max-w-3xl mx-auto mt-10 p-6 bg-blue-50 border-4 border-blue-600 rounded-lg shadow-lg text-center text-blue-900">
        <h1 class="text-3xl font-bold mb-4">Booking Successful!</h1>
        <p class="mb-6 text-lg">Thank you, <strong>{{ $booking->user_full_name }}</strong>, your booking is confirmed.</p>

        <div class="text-left space-y-2 text-blue-800">
            <p><strong>Car:</strong> {{ $booking->car->name ?? 'N/A' }}</p>
            <p><strong>From:</strong> {{ $booking->fromCity->name ?? 'N/A' }}</p>
            <p><strong>To:</strong> {{ $booking->toCity->name ?? 'N/A' }}</p>
            <p><strong>Fare:</strong> ${{ number_format($booking->fare, 2) }}</p>
            <p><strong>Booking Date & Time:</strong>
                {{ \Carbon\Carbon::parse($booking->booking_time)->format('F j, Y, g:i A') }}</p>
        </div>

        <a href="{{ route('home') }}"
            class="inline-block mt-8 px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Back
            to Home</a>
    </section>
@endsection
