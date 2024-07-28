<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table='alternatifs';

    protected $fillable =[
        'nama_alternatif',
        'kode_alternatif',
        'preferensi'
    ];
}
