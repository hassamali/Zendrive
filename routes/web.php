<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage with booking form
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Booking flow routes
Route::post('/available-cars', [BookingController::class, 'availableCars'])->name('available.cars');

Route::get('/booking-details', [BookingController::class, 'bookingDetails'])->name('booking.details');
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');

// Show the user data form page
Route::get('/booking/form', [BookingController::class, 'showBookingForm'])->name('booking.form');

// Success page after booking
Route::get('/booking/success/{booking}', [BookingController::class, 'bookingSuccess'])->name('booking.success');

// Admin dashboard (protected)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin booking status update
Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('booking.updateStatus');

// Breeze user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze authentication routes
require __DIR__ . '/auth.php';
