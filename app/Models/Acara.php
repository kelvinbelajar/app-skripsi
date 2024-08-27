<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    
    protected $table = 'acaras';

    protected $fillable = [
        'nama_acara',
        'kategori',
        'deskripsi',
        'gambar',
        'id_eo',
        'estimasi_pengunjung',
        'biaya_tiket',
        'anggaran',
    ];

    public function event_organizer()
    {
        return $this->belongsTo(EventOrganizer::class, 'id_eo');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_acara');
    }
}
