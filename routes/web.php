<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');
