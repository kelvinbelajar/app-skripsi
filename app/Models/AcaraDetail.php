<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcaraDetail extends Model
{
    use HasFactory;

    protected $table = 'acara_details';

    protected $fillable = [
        'id_eo',
        'id_acara',
        'id_jadwal',
        'id_lokasi',
    ];

    public function eventOrganizer()
    {
        return $this->belongsTo(EventOrganizer::class, 'id_eo');
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }



    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
