<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kengiatan extends Model
{
    use HasFactory;
    protected $table="kegiatan_tb";
    protected $fillable = ['judul', 'isi', 'image'];
}
