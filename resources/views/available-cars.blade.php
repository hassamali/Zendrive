@extends('layouts.app')

@section('content')
    <div>
        {{-- Booking Summary --}}
        <div class="bg-white shadow-md rounded-xl p-4 mb-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-2 text-gray-800">Your Booking Details</h2>
            <p><strong>From:</strong> {{ $from_city }}</p>
            <p><strong>To:</strong> {{ $to_city }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Time:</strong> {{ $time }}</p>
        </div>

        {{-- Available Cars --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Available Cars</h3>

            @if ($fares->isEmpty())
                <p class="text-gray-500">No cars available for the selected route.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($fares as $fare)
                        <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm flex flex-col justify-between">
                            <div>
                                <p class="text-gray-800 font-medium mb-2">{{ $fare->car->name }}</p>
                                <p class="text-gray-600 text-sm mb-4">Fare: Rs {{ number_format($fare->fare, 0) }}</p>
                            </div>

                            <form action="{{ route('booking.details') }}" method="GET" class="mt-auto">
                                <input type="hidden" name="car_id" value="{{ $fare->car->id }}">
                                <input type="hidden" name="from_city_id" value="{{ $fare->from_city_id }}">
                                <input type="hidden" name="to_city_id" value="{{ $fare->to_city_id }}">
                                <input type="hidden" name="date" value="{{ $date }}">
                                <input type="hidden" name="time" value="{{ $time }}">
                                <input type="hidden" name="fare" value="{{ $fare->fare }}">

                                <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition w-full">
                                    Book Now
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection
