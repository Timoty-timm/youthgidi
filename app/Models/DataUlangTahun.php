<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUlangTahun extends Model
{
    use HasFactory;
    protected $table = 'dataulangtahun_tb';
    protected $fillable = [
        'nama', 'image'
    ];
}
