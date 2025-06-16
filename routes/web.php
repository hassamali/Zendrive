<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CarController;

/*
|--------------------------------------------------------------------------
| Public Website Routes (Guest Users)
|--------------------------------------------------------------------------
*/

// Homepage with booking form
Route::get('/', fn() => view('welcome'))->name('home');

// Booking flow (public users)
Route::post('/available-cars', [BookingController::class, 'availableCars'])->name('available.cars');
Route::get('/booking-details', [BookingController::class, 'bookingDetails'])->name('booking.details');
Route::get('/booking/form', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');
Route::get('/booking/success/{booking}', [BookingController::class, 'bookingSuccess'])->name('booking.success');

/*
|--------------------------------------------------------------------------
| Admin Panel (Protected Routes)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |----------------------------------------------------------------------
    | Admin Routes (Cities, Cars, etc.)
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        // Cities CRUD + toggle
        Route::resource('cities', CityController::class);
        Route::patch('cities/{city}/toggle', [CityController::class, 'toggle'])->name('cities.toggle');

        // Cars CRUD + optional visibility toggle if needed
        Route::resource('cars', CarController::class);
        Route::patch('cars/{car}/toggle-visibility', [CarController::class, 'toggleVisibility'])->name('cars.toggleVisibility');

    });

    /*
    |----------------------------------------------------------------------
    | Booking Status Update (outside of /admin prefix)
    |----------------------------------------------------------------------
    */
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])
        ->name('booking.updateStatus');
});


/*
|--------------------------------------------------------------------------
| User Profile (Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
