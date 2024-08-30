<?php

namespace App\Http\Controllers;

use App\Models\BookingTiket;
use App\Models\AcaraDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // public function process(Request $request)
    // {
    //     $data = $request->all();

    //     $bookingtiket = BookingTiket::create([
    //         'id_acara' => $data['id_acara'],
    //         'nama_lengkap' => $data['nama_lengkap'],
    //         'notelp' => $data['notelp'],
    //         'email' => $data['email'],
    //     ]);

    //     return redirect()->route('checkout', $bookingtiket->id);
    // }
}
