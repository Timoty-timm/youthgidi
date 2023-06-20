<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    public function index(){
        $data = Product::latest()->paginate(5);
    
        return view('Users.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
