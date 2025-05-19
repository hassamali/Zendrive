<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/available-cars', [BookingController::class, 'availableCars'])->name('available.cars');

Route::get('/booking-details', [BookingController::class, 'bookingDetails'])->name('booking.details');
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');

// Show the user data form page
Route::get('/booking/form', [BookingController::class, 'showBookingForm'])->name('booking.form');

// Handle booking form submission
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');

Route::get('/booking/success/{booking}', [BookingController::class, 'bookingSuccess'])->name('booking.success');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
