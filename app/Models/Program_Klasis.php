<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Klasis extends Model
{
    use HasFactory;

    protected $table="kerjaklasis";
    protected $fillable = [
        'program', 'required',
        'tujuan', 'required',
        'waktu', 'required',
        'sasaran', 'required'
   ];
}
