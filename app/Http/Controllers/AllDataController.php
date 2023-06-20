<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\User;
use Illuminate\Http\Request;

class AllDataController extends Controller
{
    public function index(){
        $all = User::paginate(5);
        $counts = IuranWajib::count();
        $count = User::count();
        //dd('datata');
        return view('Halaman_Admin.index', compact('all', 'counts', 'count'))->with('all', $all)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function destroy($id)
{
  $blog = User::findOrFail($id);
  $blog->delete();

  if($blog){
     //redirect dengan pesan sukses
     return redirect()->route('all-data.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('all-data.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}
