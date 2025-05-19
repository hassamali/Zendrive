@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4">
        <h2 class="text-xl font-semibold mb-4">Confirm Your Booking</h2>

        {{-- Booking Summary --}}
        <div class="bg-white shadow-md rounded-xl p-4 mb-6 border border-gray-200">
            <p><strong>From:</strong> {{ $from_city }}</p>
            <p><strong>To:</strong> {{ $to_city }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Time:</strong> {{ $time }}</p>
            <p><strong>Car:</strong> {{ $car->name }}</p>
            <p><strong>Fare:</strong> Rs {{ number_format($fare, 0) }}</p>
        </div>

        {{-- User info form --}}
        <form action="{{ route('booking.submit') }}" method="POST"
            class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
            @csrf
            {{-- Hidden inputs to carry booking info --}}
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <input type="hidden" name="from_city_id" value="{{ $from_city_id }}">
            <input type="hidden" name="to_city_id" value="{{ $to_city_id }}">
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="time" value="{{ $time }}">
            <input type="hidden" name="fare" value="{{ $fare }}">

            {{-- User Name --}}
            <label class="block mb-4">
                <span class="text-gray-700 font-medium">Full Name</span>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </label>

            {{-- Phone Number --}}
            <label class="block mb-4">
                <span class="text-gray-700 font-medium">Phone Number</span>
                <input type="tel" name="phone" value="{{ old('phone') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </label>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Confirm Booking
            </button>
        </form>
    </div>
@endsection
