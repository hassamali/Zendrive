<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Booking status updated successfully.');
    }
}
