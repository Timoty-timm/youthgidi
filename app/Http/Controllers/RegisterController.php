<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function create()
    {
        $counts = IuranWajib::count();
        return view('Register.register', compact('counts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required',]
    ]);
       $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('register');
        }
    }


}
