<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Visimisi;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = Visimisi::count();
        $visimisi = Visimisi::latest()->paginate(500);

        return view('Data-Admin.Profil.VisiMisi.index',compact('visimisi', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counts = Visimisi::count();
        return view('Data-Admin.Profil.VisiMisi.create', compact('counts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Visimisi::create($request->all());

        return redirect()->route('visimisis.index')
                        ->with('success','Visi dan Misi created successfully.');
    }

   
    public function edit(Visimisi $visimisi)
    {
        $counts = Visimisi::count();
        $visimis = Visimisi::find($visimisi);
        return view('Data-Admin.Profil.visimisi.edit',compact('visimisi', 'counts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $visimisi->update($request->all());

        return redirect()->route('visimisis.index')
                        ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();
        return redirect()->route('visimisis.index')
                        ->with('success','Data berhasil dihapus');
    
        }
}
