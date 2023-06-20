<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $table = 'wilayah_tb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik', 'nama','masajabatan','alamat'
    ];
}
