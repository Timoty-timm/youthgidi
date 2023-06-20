<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'corousels';
    protected $fillable = [
        'image', 'title', 'isi'
    ];
    protected static function boot()
    {
        parent::boot();
    static::deleting(function ($image) {
        // Hapus file saat data dihapus
        if ($image->file) {
            Storage::disk('public')->delete($image->file);
        }
    });
}
   
}

