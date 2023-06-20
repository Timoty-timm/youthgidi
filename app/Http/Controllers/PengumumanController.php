<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::latest()->paginate(5);

        return view('Data-Admin.Pengumuman.index',compact('pengumuman', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Pengumuman.create', compact('counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman.index')
                        ->with('success','Data berhasil ditambah.');
    }
     public function show($id){
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::find($id);
        return view('Data-Admin.Pengumuman.show', compact('pengumuman', 'counts'))->with('i', (request()->input('page', 1) - 1) * 500);
     }
   
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::find($id);
        return view('Data-Admin.Pengumuman.edit',compact('pengumuman', 'counts'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')
                        ->with('success','Data berhasil diubah');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
                        ->with('success','Data berhasil dihapus');
    }
}
