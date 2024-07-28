<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $table = "respondens";

    protected $fillable = [
        'nim',
        'nama_responden',
        'angkatan',
        'email',
        'no_hp',
        'kelamin',
        'pilihan_kriteria',
        'pilihan',
        'alternatif1',
        'alternatif2',
        'alternatif3',
        'alternatif4',
        'alternatif5'
    ];
}
