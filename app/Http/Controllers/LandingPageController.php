<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\AcaraDetail;
use App\Models\LandingPage;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use App\Models\BookingTiket;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingTicketMail;
use Illuminate\Support\Facades\Log;

class LandingPageController extends Controller
{
    public function index()
    {
        $acara = AcaraDetail::with('acara', 'jadwal', 'lokasi')->get();
        $locations = Lokasi::with('province', 'regency', 'district', 'village')->get();
        return view('landing', compact('acara', 'locations'));
    }

    public function bookTicket(Request $request)
{
    Log::info('Booking request received', $request->all());

    try {
        // Validate the incoming request
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'jumlah_tiket' => 'required|integer|min:1',
            'acara_id' => 'required|exists:acaras,id', // Validate acara_id instead of id_acara
            'harga' => 'required|numeric',
        ]);
        
        $hitung = $validatedData['harga'] * $validatedData['jumlah_tiket'];
        return $hitung;
        

        Log::info('Validated data', $validatedData);

        // Create a new booking record
        $bookingTiket = BookingTiket::create([
            'id_acara' => $validatedData['acara_id'], // Use acara_id here
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'notelp' => $validatedData['notelp'],
            'email' => $validatedData['email'],
            'status_bayar' => 'Belum Bayar',
        ]);

        

        Log::info('Booking saved', $bookingTiket->toArray());

        // Send a confirmation email
        Mail::to($validatedData['email'])->send(new BookingTicketMail($bookingTiket));

        return redirect()->back()->with('success', 'Booking successful! Check your email for details.');
    } catch (\Exception $e) {
        Log::error('Error during booking', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}






    public function sendTestEmail()
    {
        Mail::raw('This is a test email to verify SMTP settings.', function ($message) {
            $message->to('mhmmdalfkr026@gmail.com')
                ->subject('Test Email');
        });

        return 'Test email sent!';
    }
}
