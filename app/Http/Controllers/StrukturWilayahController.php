<?php

namespace App\Http\Controllers;

use App\Models\Struktur_Wilayah;
use Illuminate\Http\Request;

class StrukturWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur_Wilayah = Struktur_Wilayah::latest()->paginate(500);

        return view('Data-Admin.Profil.Struktur_Organisasi.Pengurus-Wilayah.index',compact('struktur_Wilayah'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Admin.Profil.Struktur_Organisasi.Pengurus-Wilayah.create');
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
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        Struktur_Wilayah::create($request->all());

        return redirect()->route('strukturwilayah.index')
                        ->with('success','Strukktur Wilayah created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur_Wilayah  $struktur_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur_Wilayah $struktur_Wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur_Wilayah  $struktur_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur_Wilayah $struktur_Wilayah)
    {
        $struktur_Wilayah = Struktur_Wilayah::find($struktur_Wilayah);
        return view('Data-Admin.Profil.Struktur_Organisasi.Pengurus-Wilayah.edit',compact('struktur_Wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur_Wilayah  $struktur_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur_Wilayah $struktur_Wilayah)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        $struktur_Wilayah->update($request->all());

        return redirect()->route('strukturwilayah.index')
                        ->with('success','struktur Wilayah updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur_Wilayah  $struktur_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur_Wilayah $struktur_Wilayah)
    {
        $struktur_Wilayah->delete();

        return redirect()->route('strukturwilayah.index')
                        ->with('success','Struktur Wilayah deleted successfully');
    }
}
