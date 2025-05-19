@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4">
        {{-- Booking Summary --}}
        <div class="bg-white shadow-md rounded-xl p-4 mb-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-2 text-gray-800">Confirm Your Booking</h2>
            <p><strong>Car:</strong> {{ $car->name }}</p>
            <p><strong>From:</strong> {{ $from_city }}</p>
            <p><strong>To:</strong> {{ $to_city }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Time:</strong> {{ $time }}</p>
            <p><strong>Fare:</strong> Rs {{ number_format($fare, 0) }}</p>
        </div>

        {{-- User Info Form --}}
        <form action="{{ route('booking.submit') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow border border-gray-200">
            @csrf

            {{-- Hidden fields to carry booking data --}}
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <input type="hidden" name="from_city_id" value="{{ $request->input('from_city_id', '') }}">
            <input type="hidden" name="to_city_id" value="{{ $request->input('to_city_id', '') }}">
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="time" value="{{ $time }}">
            <input type="hidden" name="fare" value="{{ $fare }}">

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Full Name</label>
                <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded px-3 py-2"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-medium mb-1">Mobile Number</label>
                <input type="text" id="phone" name="phone" required class="w-full border border-gray-300 rounded px-3 py-2"
                    value="{{ old('phone') }}">
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="pickup_location" class="block font-medium mb-1">Pickup Location</label>
                <input type="text" id="pickup_location" name="pickup_location" required
                    class="w-full border border-gray-300 rounded px-3 py-2" value="{{ old('pickup_location') }}">
                @error('pickup_location')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Submit
            </button>


        </form>
    </div>
@endsection
