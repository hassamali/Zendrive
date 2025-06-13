<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['fromCity', 'toCity']);

        // Filter by selected date
        if ($request->filled('date')) {
            $query->whereDate('booking_time', $request->date);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Clone query for accurate summary cards
        $filteredQuery = clone $query;

        return view('dashboard', [
            'bookings' => $query->latest()->paginate(5)->withQueryString(), // pagination with filters preserved
            'totalBookings' => $filteredQuery->count(),
            'pendingCount' => (clone $filteredQuery)->where('status', 'pending')->count(),
            'completedCount' => (clone $filteredQuery)->where('status', 'completed')->count(),
            'totalRevenue' => (clone $filteredQuery)->where('status', 'completed')->sum('fare'),
        ]);
    }


}
