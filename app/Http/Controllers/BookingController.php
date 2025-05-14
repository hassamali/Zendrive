<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Send Email
        Mail::to('hassamaliqazalbash@gmail.com')->send(new BookingConfirmation($data));

        // Redirect to WhatsApp
        $whatsappMessage = urlencode("New Booking Request:\nName: {$data['name']}\nPhone: {$data['phone']}");
        $whatsappNumber = '923339002222'; // <-- Replace with your WhatsApp number

        return redirect("https://wa.me/$whatsappNumber?text=$whatsappMessage");
    }
}
