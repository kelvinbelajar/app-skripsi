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
use Illuminate\Support\Facades\Log;

class LandingPageController extends Controller
{
    public function index()
    {
        $acara = AcaraDetail::with('acara', 'jadwal', 'lokasi')->get();
        $locations = Lokasi::with('province', 'regency', 'district', 'village')->get();
        return view('landing', compact('acara', 'locations'));
    }

    public function checkout(Request $request)
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Create a transaction
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->harga * $request->jumlah_tiket,
            ],
            'customer_details' => [
                'first_name' => $request->nama_lengkap,
                'email' => $request->email,
                'phone' => $request->notelp,
            ],
            'item_details' => [
                [
                    'id' => $request->acara_id,
                    'price' => $request->harga,
                    'quantity' => $request->jumlah_tiket,
                    'name' => "Ticket for Event"
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Store transaction details in session
        session(['transaction_data' => $params]);

        return view('payment', compact('snapToken'));
    }



    public function handlePaymentCallback(Request $request)
{
    $transactionData = session('transaction_data');
    
    try {
        // Verify the transaction using Midtrans Transaction API
        $transaction = Transaction::status($request->transaction_id);

        if ($transaction['transaction_status'] === 'settlement') {
            $fileName = '1725020294_402-717-2-PB.pdf'; // Change as necessary
            $filePath = 'public/bukti_bayar/' . $fileName; // Ensure the correct path

            BookingTiket::create([
                'id_acara' => $transactionData['item_details'][0]['id'],
                'nama_lengkap' => $transactionData['customer_details']['first_name'],
                'notelp' => $transactionData['customer_details']['phone'],
                'email' => $transactionData['customer_details']['email'],
                'bukti_bayar' => $filePath, // Adjust path as needed
            ]);

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Transaction status is not settlement']);
        }
    } catch (\Exception $e) {
        Log::error('Payment callback error: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Error verifying payment: ' . $e->getMessage()]);
    }
}





    public function testBookingInsertion()
    {
        $booking = BookingTiket::create([
            'id_acara' => 1,  // Use valid test data
            'nama_lengkap' => 'Test Name',
            'notelp' => '1234567890',
            'email' => 'test@example.com',
            'bukti_bayar' => 'test.pdf'
        ]);

        dd($booking);
    }
}
