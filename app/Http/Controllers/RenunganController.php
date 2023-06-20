<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Renungan;
use Illuminate\Http\Request;

class RenunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = IuranWajib::count();
        $renungan = Renungan::latest()->paginate(5);

        return view('Data-Admin.Renungan.index',compact('renungan', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Renungan.create', compact('counts'));
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

        $input = $request->all();

        Renungan::create($input);

        return redirect()->route('renungan.index')
                        ->with('success','Data berhasil di tambah');
    }

    
    public function edit(Renungan $renungan)
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Renungan.edit',compact('renungan', 'counts'));
    }

    public function update(Request $request, Renungan $renungan)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $input = $request->all();

        $renungan->update($input);

        return redirect()->route('renungan.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        $renungan->delete();

        return redirect()->route('renungan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
