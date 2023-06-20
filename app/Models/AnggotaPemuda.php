<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPemuda extends Model
{
    use HasFactory;
    protected $table = 'anggota_tb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik', 'jk', 'nama','wilayah', 'klasis', 'tgl','alamat'
    ];
}
