<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadProfile extends Model
{
    use HasFactory;
    protected $table='uploadprofile_tb';
    protected $fillable = ['nama', 'image'];
}
