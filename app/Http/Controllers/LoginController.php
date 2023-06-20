<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function index(){
        $counts = IuranWajib::count();
        if ($user = Auth::user()) {
            if ($user ->level =='1') {
                return redirect()->intended('pusat');
            }if($user->level =='2'){
                return redirect()->intended('wilayah');
            }elseif($user->level =='3'){
                return redirect()->intended('klasis');
           }elseif($user->level =='4'){
            return redirect()->intended('pemuda');
           }elseif($user->level =='5'){
           return redirect()->intended('anggotapemuda');
           }elseif($user->level =='6'){
            return redirect()->intended('sekertaris');
           }elseif($user->level =='7'){
           return redirect()->intended('bendahara');
            }
           }
        return view('login.view_login', compact('counts'));

    }

    
     public function proses(Request $request){
       $request ->validate([
          'username'=>'required',
          'password'=>'required', 
           
       ]);

        if(Auth::attempt($request->only('username','password'))){
            return back()->with('login','invalid login details');
        }
        return redirect()->route('login');

       $kreadisasi = $request->only('username','password');

        if (Auth::attempt($kreadisasi)) {
        $request->session()->regenerate();
        if ($user = Auth::user()) {
            if($user->level =='1') {
                return redirect()->intended('pusat');
            }elseif($user->level =='2'){
                return redirect()->intended('wilayah');
            }elseif($user->level =='3'){
                return redirect()->intended('klasis');
            }elseif($user->level =='4'){
                return redirect()->intended('pemuda');
            }elseif($user->level =='5'){
                return redirect()->intended('anggotapemuda');
            }elseif($user->level =='6'){
                return redirect()->intended('sekertaris');
            }elseif($user->level =='7'){
                return redirect()->intended('bendahara');
            }
            return redirect()->Intended('login');

}
       return back()->withErrors([
        'username'=>'Maaf username atau password anda salah',
       ])->onlyInput('username');
     }
}
public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('login');
}
}
