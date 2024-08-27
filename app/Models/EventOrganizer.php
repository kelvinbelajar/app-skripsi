<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    use HasFactory;

    protected $table = 'event_organizers';

    protected $fillable = [
        'nama_organisasi',
        'kontak',
        'email_organisasi',
        'no_rekening',
    ];

    public function acaras()
    {
        return $this->hasMany(Acara::class, 'id_eo');
    }
    
}
