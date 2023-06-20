<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPemuda;
use App\Models\Klasis;
use App\Models\Pemuda;
use App\Models\Pusat;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function datapusat(){
        $post = Pusat::all();
        return view('Data-User.datapusat', compact('post'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function datawilayah(){
        $post = Wilayah::all();
        return view('Data-User.datawilayah', compact('post'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dataklasis(){
        $klasiss = Klasis::all();
        return view('Data-User.dataklasis', compact('klasiss'))->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function datapemuda(){
        $pemuda = Pemuda::all();
        return view('Data-User.datapemuda', compact('pemuda'))->with('pemuda', $pemuda)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function datanggota(){
        $anggota = AnggotaPemuda::all();
        return view('Data-User.datanggota', compact('anggota'))->with('anggota', $anggota)->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
