<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTerbaru extends Model
{
    use HasFactory;
    protected $table = 'beritaterbaru_tb';
    protected $fillable = [
        'judul', 'isi', 'image'
    ];
}
