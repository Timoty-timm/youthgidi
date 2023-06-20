<?php

namespace App\Http\Controllers;

use App\Models\Program_Klasis;
use Illuminate\Http\Request;

class Program_KlasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasiss = Program_Klasis::latest()->paginate(5);

        return view('Data-Admin.Program_Kerja.Klasis.index',compact('klasiss'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Admin.Program_Kerja.Klasis.create');
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

        Program_Klasis::create($request->all());

        return redirect()->route('klasiss.index')
                        ->with('success','Klasis updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program_Klasis  $program_Klasis
     * @return \Illuminate\Http\Response
     */
    public function show(Program_Klasis $program_Klasis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program_Klasis  $program_Klasis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program_klasis = Program_Klasis::find($id);
        return view('Data-Admin.Program_Kerja.Klasis.edit',compact('program_klasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program_Klasis  $program_Klasis
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
        Program_Klasis::where('id', $id)->update($update);

        return redirect()->route('klasiss.index')
                        ->with('success','Proker Klasis updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program_Klasis  $program_Klasis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program_klasis = Program_Klasis::find($id);
        $program_klasis->delete();

        return redirect()->route('klasiss.index')
                        ->with('success','Klasis deleted successfully');
    }
}
