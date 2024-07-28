<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guest_responden extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'tanggal_lahir',
        'angkatan',
        'email',
        'no_hp',
        'kelamin',
        'kriteria',
        'rekomendasi'
    ];
}

