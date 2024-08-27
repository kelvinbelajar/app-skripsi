<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_acara',
        'tanggal_pengeluaran',
        'nominal_pengeluaran',
        'bukti_pengeluaran',

    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }
}
