<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    public function eventOrganizer()
    {
        return $this->belongsTo(EventOrganizer::class, 'id_eo');
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
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
