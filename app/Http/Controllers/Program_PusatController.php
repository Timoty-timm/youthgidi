<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Program_Pusat;
use Illuminate\Http\Request;

class Program_PusatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pusats = Program_Pusat::latest()->paginate(5);
        $counts = IuranWajib::all();
        return view('Data-Admin.Program_Kerja.Pusat.index',compact('pusats', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Admin.Program_Kerja.Pusat.create');
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
            'program' => 'required',
            'tujuan' => 'required',
            'waktu' => 'required',
            'sasaran' => 'required',
        ]);

        Program_Pusat::create($request->all());
      
       return redirect('pusats')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $program_pusat = Program_Pusat::find($id);
        return view('Data-Admin.Program_Kerja.Pusat.edit',compact('program_pusat'));
    }

  
    public function update(Request $request, $id)
    {
        if(  $update = [
            'program' => $request->program,
            'tujuan' => $request->tujuan,
            'waktu' => $request->waktu,
            'sasaran' => $request->sasaran,
        ]) if(Program_Pusat::where('id', $id)->update($update)){
            return redirect()->route('pusats.index')
            ->with('success','Data telah berhasil diubah');
           
         }else{
            return redirect()->route('pusats.index')
            ->with('success','Data belum diubah');
            
         };
    }

    
    public function destroy($id)
    {
        $program_pusat = Program_Pusat::find($id);
        $program_pusat->delete();

        return redirect()->route('pusats.index')
                        ->with('success','Proker Pusat deleted successfully');
    }
}
