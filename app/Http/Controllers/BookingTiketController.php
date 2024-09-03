<?php

namespace App\Http\Controllers;

use App\Mail\BookingTicketMail;
use App\Models\BookingTiket;
use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Facades\Storage;
use Midtrans\Config;
use Midtrans\Snap;

class BookingTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookingTiket = BookingTiket::all();
        return view('booking_tikets.index', compact('bookingTiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('booking_tikets.create', compact('acaras'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'id_acara' => 'required|exists:acaras,id',
            'nama_lengkap' => 'required',
            'notelp' => 'required',
            'email' => 'required|email',
            'bukti_bayar' => 'required|file|mimes:pdf|max:2048', // Accept only PDF files
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_bayar', $fileName); // Store file in 'storage/app/public/bukti_bayar'
        }

        $bookingTiket = new BookingTiket();
        $bookingTiket->id_acara = $request->id_acara;
        $bookingTiket->nama_lengkap = $request->nama_lengkap;
        $bookingTiket->notelp = $request->notelp;
        $bookingTiket->email = $request->email;
        $bookingTiket->bukti_bayar = $fileName; // Store file name
        $bookingTiket->save();

        return redirect()->route('booking_tikets.index')->with('success', 'Booking Tiket created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(BookingTiket $bookingTiket)
    {
        return view('booking_tikets.show', compact('bookingTiket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingTiket $bookingTiket)
    {
        $acaras = Acara::all();
        return view('booking_tikets.edit', compact('bookingTiket', 'acaras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingTiket $bookingTiket)
    {
        $request->validate([
            'id_acara' => 'required|exists:acaras,id',
            'nama_lengkap' => 'required',
            'notelp' => 'required',
            'email' => 'required|email',
            'bukti_bayar' => 'required|file|mimes:pdf|max:2048', // Accept only PDF files
        ]);

        $bookingTiket->id_acara = $request->id_acara;
        $bookingTiket->nama_lengkap = $request->nama_lengkap;
        $bookingTiket->notelp = $request->notelp;
        $bookingTiket->email = $request->email;
        if ($request->hasFile('bukti_bayar')) {
            $oldFileName = $bookingTiket->bukti_bayar;
            $newFileName = time() . '_' . $request->file('bukti_bayar')->getClientOriginalName();
            $request->file('bukti_bayar')->storeAs('public/bukti_bayar', $newFileName);
            if ($oldFileName) {
                Storage::delete('public/bukti_bayar/' . $oldFileName);
            }
            $bookingTiket->bukti_bayar = $newFileName;
        }
        $bookingTiket->update();

        return redirect()->route('booking_tikets.index')->with('success', 'Booking Tiket updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingTiket $bookingTiket)
    {
        $bookingTiket->delete();
        Storage::delete('public/bukti_bayar/' . $bookingTiket->bukti_bayar);
        return redirect()->route('booking_tikets.index')->with('success', 'Booking Tiket deleted successfully.');
    }
}
