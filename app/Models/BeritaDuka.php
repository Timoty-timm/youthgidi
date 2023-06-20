<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaDuka extends Model
{
    use HasFactory;

    protected $table = 'berita_duka_tb';
    protected $fillable = [
        'judul', 'isi', 'image'
    ];
}
