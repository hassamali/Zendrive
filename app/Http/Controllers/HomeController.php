<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function book(Request $request)
    {
        // Here we will handle sending email/WhatsApp (next steps)
        return back()->with('success', 'Booking Request Sent!');
    }
}
