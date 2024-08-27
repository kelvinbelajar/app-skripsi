<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_acara',
        'tanggal_pemasukan',
        'nominal_pemasukan',
        'bukti_pemasukan'
    ];
    
    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }
}
