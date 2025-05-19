<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fare;
use App\Models\City;
use App\Models\Car;
use App\Models\Booking; // Assuming you have a Booking model for storing bookings
use Carbon\Carbon;


class BookingController extends Controller
{
    // Show available cars based on search
    public function availableCars(Request $request)
    {
        $validated = $request->validate([
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $fares = Fare::with('car')
            ->where('from_city_id', $validated['from_city_id'])
            ->where('to_city_id', $validated['to_city_id'])
            ->get();

        return view('available-cars', [
            'fares' => $fares,
            'from_city' => City::find($validated['from_city_id'])->name ?? 'Unknown',
            'to_city' => City::find($validated['to_city_id'])->name ?? 'Unknown',
            'date' => $validated['date'],
            'time' => $validated['time'],
        ]);
    }

    // Show booking details form after selecting a car
    public function bookingDetails(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'date' => 'required|date',
            'time' => 'required',
            'fare' => 'required|numeric',
        ]);

        return view('booking-details', [
            'car' => Car::find($validated['car_id']),
            'from_city' => City::find($validated['from_city_id'])->name,
            'to_city' => City::find($validated['to_city_id'])->name,
            'date' => $validated['date'],
            'time' => $validated['time'],
            'fare' => $validated['fare'],
            'request' => $request, // to access hidden inputs in blade
        ]);
    }

    // Process final booking submission
    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'date' => 'required|date',
            'time' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'pickup_location' => 'required|string|max:255',
        ]);

        $bookingTime = Carbon::parse($validated['date'] . ' ' . $validated['time']);

        // Fetch fare amount from database
        $fareRecord = Fare::where('car_id', $validated['car_id'])
            ->where('from_city_id', $validated['from_city_id'])
            ->where('to_city_id', $validated['to_city_id'])
            ->first();

        if (!$fareRecord) {
            return back()->withErrors(['fare' => 'Fare not found for selected car and route'])->withInput();
        }

        $booking = Booking::create([
            'car_id' => $validated['car_id'],
            'from_city_id' => $validated['from_city_id'],
            'to_city_id' => $validated['to_city_id'],
            'booking_time' => $bookingTime,
            'user_full_name' => $validated['name'],
            'user_phone' => $validated['phone'],
            'pickup_address' => $validated['pickup_location'],
            'fare' => $fareRecord->fare,  // <-- assign fare here
        ]);

        return redirect()->route('booking.success', $booking->id);
    }



    public function showBookingForm(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'date' => 'required|date',
            'time' => 'required',
            'fare' => 'required|numeric',
        ]);

        return view('booking-form', [
            'car' => Car::find($validated['car_id']),
            'from_city' => City::find($validated['from_city_id'])->name,
            'to_city' => City::find($validated['to_city_id'])->name,
            'date' => $validated['date'],
            'time' => $validated['time'],
            'fare' => $validated['fare'],

            'from_city_id' => $validated['from_city_id'],
            'to_city_id' => $validated['to_city_id'],
        ]);
    }

    public function bookingSuccess($bookingId)
    {
        $booking = Booking::with(['car', 'fromCity', 'toCity'])->findOrFail($bookingId);

        return view('booking-success', compact('booking'));
    }


}
