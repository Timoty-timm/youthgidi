<?php

namespace App\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class CurrentPassword implements Rule
{
   
    public function __construct()
    {
        //kosong
    }
    //menngecek hash
    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);
    }
    //notifikasi jika password yang tidak masukkan
    public function message()
    {
        //return 'The validation error message.';
        return 'Current password doesn\'t match';
    }
}
