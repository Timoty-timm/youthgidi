<?php

namespace App\Http\Controllers;

use App\Models\DanaLain;
use Illuminate\Http\Request;

class DanaLainController extends Controller
{
    public function index()
    {
         $keuangan = DanaLain::all();
         $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
         $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');

         $pemasukan1 = DanaLain::where('jenis', 'pemasukan')->get();
         $pengeluaran1 = DanaLain::where('jenis', 'pengeluaran')->get();

         $saldo = $pemasukan - $pengeluaran;
         return view('Data-Admin.Dana-Lain.index', compact('keuangan','pemasukan', 'pengeluaran', 'saldo','pemasukan1', 'pengeluaran1'));

        // $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();
        // $saldo = Keuangan::getSaldo();
        // return view('keuangan.index', compact('keuangan', 'saldo'));
    }
    public function tampilkeuangan(){
        $keuangan = DanaLain::all();
        $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');
        $pemasukan1 = DanaLain::where('jenis', 'pemasukan')->get();
        $pengeluaran1 = DanaLain::where('jenis', 'pengeluaran')->get();

        $saldo = $pemasukan - $pengeluaran;
        $userkeuangan = DanaLain::all();
        return view('Data-Admin.Dana-Lain.index', compact('keuangan','pemasukan', 'pengeluaran', 'saldo','pemasukan1', 'pengeluaran1'));
    } 
    public function create()
    {
        return view('Data-Admin.Dana-Lain.create');
    }

    public function store(Request $request)
    {

        // $keuangan = DanaLain::all();
        // DanaLain::create($request->except(['_token', 'submit']));
        // return view('Data-Admin.Dana-Lain.create', ['uang'=>$keuangan]);

        $request->validate([
            'keterangan'=>'required',
            'jenis'=>'required',
            'jumlah'=>'required|numeric',
        ]);
        DanaLain::create($request->all());

        return redirect('bkeuangan')
        ->with('success','Data Keuangan telah behasil');
    }

    public function edit(DanaLain $keuangan)
    {
        return view('Data-Admin.Dana-Lain.edit',compact('keuangan'));
    }
    public function update(Request $request, DanaLain $keuangan)
    {
        $request->validate([        
            'keterangan'=>'required',
            'jenis'=>'required',
            'jumlah'=>'required|numeric',
        ]);
    
        $keuangan->update($request->all());
    
        return redirect()->route('bkeuangan.index')
                        ->with('success','Sejarah updated successfully');
    }   

    public function destroy(DanaLain $keuangan)
    {
        $keuangan->delete();
    
        return redirect()->route('bkeuangan.index')
                        ->with('success','Live deleted successfully');
    }
}
