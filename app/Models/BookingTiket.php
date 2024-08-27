<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_acara',
        'nama_lengkap',
        'notelp',
        'email',
        'bukti_bayar',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }
}
