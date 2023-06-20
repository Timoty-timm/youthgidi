<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemuda extends Model
{
    use HasFactory;
    protected $table = 'ketuapemuda_tb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik', 'nama','masajabatan','alamat'
    ];
    
    
}
