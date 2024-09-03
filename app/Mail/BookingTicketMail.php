<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Acara; // Import the Acara model

class BookingTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;
    public $harga;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
        // Fetch harga from the Acara model based on acara_id
        $acara = Acara::all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Tiket Acara')
                    ->view('emails.booking_ticket');
    }
}
