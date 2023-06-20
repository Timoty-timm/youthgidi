<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Wilayah extends Model
{
    use HasFactory;
    protected $table="kerjawilayah";
    protected $fillable = [
        'program', 'required',
        'tujuan', 'required',
        'waktu', 'required',
        'sasaran', 'required'
   ];

}
