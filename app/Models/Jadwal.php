<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'id_acara',
        'tanggal_mulai',
        'tanggal_akhir',
        'waktu_mulai',
        'waktu_akhir',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }
}
