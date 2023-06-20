<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
//use dari file request
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\IuranWajib;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // memanggil halaman edit dari view
    public function edit()
    {
        $counts = IuranWajib::count();
        return view('password.edit', compact('counts'));
    }
    // proses menganti password
    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);
    
        return redirect()->route('user.password.edit');
    }
}