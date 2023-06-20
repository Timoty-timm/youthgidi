<?php

namespace App\Http\Controllers;

use App\Models\Program_Wilayah;
use Illuminate\Http\Request;

class Program_WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayas = Program_Wilayah::latest()->paginate(5);

        return view('Data-Admin.Program_Kerja.Wilayah.index',compact('wilayas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Admin.Program_Kerja.Wilayah.create');
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

        Program_Wilayah::create($request->all());

        return redirect()->route('wilayahs.index')
                        ->with('success','Proker Wilayah updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program_Wilayah  $program_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Program_Wilayah $program_Wilayah)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program_Wilayah  $program_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program_wilayah = Program_Wilayah::find($id);
        return view('Data-Admin.Program_Kerja.Wilayah.edit',compact('program_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program_Wilayah  $program_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'program' => $request->program,
            'tujuan' => $request->tujuan,
            'waktu' => $request->waktu,
            'sasaran' => $request->sasaran,
        ];
        Program_Wilayah::where('id', $id)->update($update);

        return redirect()->route('wilayahs.index')
                        ->with('success','Proker Wilayah updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program_Wilayah  $program_Wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program_wilayah = Program_Wilayah::find($id);
        $program_wilayah->delete();

        return redirect()->route('wilayahs.index')
                        ->with('success','Proker Wilayah deleted successfully');
    }
}
