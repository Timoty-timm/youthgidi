<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DataFoto extends Model
{
    use HasFactory;
    protected $table="datafoto_tb";
    protected $fillable = ['judul', 'isi', 'image'];

    protected static function boot()
    {
        parent::boot();
    static::deleting(function ($image) {
        // Hapus file saat data dihapus
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
    });
}
}
