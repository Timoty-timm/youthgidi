<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Ketua extends Model
{
    use HasFactory;
    protected $table='profile_ketua_tb';
    protected $fillable = ['nama', 'image'];
}
