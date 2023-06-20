<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CekUserLogin
{
   
    public function handle(Request $request, Closure $next, $rules)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $user = Auth::User();
        if($user->level == $rules)
        // ($user && $user->level === 'login')
        {
        return $next($request);
        }
        return redirect('login')->with('error','Kamu tidak dapat akses');
    }
}


