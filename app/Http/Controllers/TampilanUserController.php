<?php

namespace App\Http\Controllers;
use App\Models\Pusat;
use Illuminate\Http\Request;

class TampilanUserController extends Controller
{
    public function pusat(){
        $kegiatan = Pusat::all();
        return view('Tampilan-User.pusat', compact('kegiatan'))->with('kegiatan', $kegiatan)->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
