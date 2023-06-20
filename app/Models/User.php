<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    ///tambhakan 2 data yaitu username dan level
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'level'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function parent()
    {
        return $this->belongsTo(Level::class, 'id');
    }
    public function notifications()
{
    return $this->hasMany(Notification::class);
}
}
