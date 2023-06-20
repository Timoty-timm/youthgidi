<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Informasi::all();
        return view('Beranda.Informasi-Terbaru.index',compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Beranda.Informasi-Terbaru.create');
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
            'waktu' => 'required',
            'tujuan' => 'required',
            'aksi' => 'required',
        ]);

        // $path = $request->file('image')->store('public/images');

        $informasi = new Informasi;

        $informasi->waktu = $request->waktu;
        $informasi->tujuan = $request->tujuan;
        $informasi->aksi = $request->aksi;

        $informasi->save();


        return redirect()->route('informasi.index')
                        ->with('success','Informasi has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('informatis.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = Informasi::find($id);
        return view('Beranda.Informasi-Terbaru.edit',compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'waktu' => $request->waktu,
            'tujuan' => $request->tujuan,
            'aksi' => $request->aksi,
        ];
        Informasi::where('id', $id)->update($update);
        // Program_Wilayah::where('id', $id)->update($update);

        return redirect()->route('informasi.index')
                        ->with('success','Infromasi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('informasi.index')
                        ->with('success','Post has been deleted successfully');
    }
}
