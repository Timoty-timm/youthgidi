<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur_Wilayah extends Model
{
    use HasFactory;

    protected $table='struktur__wilayahs';
    protected $fillable = [
        'nama', 'jabatan',
    ];
}
