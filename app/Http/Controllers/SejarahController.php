<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = IuranWajib::count();
        $sejarah = Sejarah::latest()->paginate(500);

            return view('Data-Admin.Profil.Sejarah.index',compact('sejarah', 'counts'))
                ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Profil.Sejarah.create', compact('counts'));
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
            'isi' => 'required'
        ]);

        Sejarah::create($request->all());

        return redirect()->route('sejarah.index')
                        ->with('success','Sejarah created successfully.');
    }

 
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $sejaras = Sejarah::find($id);
        return view('Data-Admin.Profil.Sejarah.edit',compact('sejaras', 'counts'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $sejarah  = $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            
        ]);
        $sejarah           = Sejarah::find($id);
        $sejarah->judul    = $request->judul;
        $sejarah->isi  = $request->isi;
        $sejarah->save();
        return redirect('sejarah')
        ->with('success','Sejarah updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sejarah $wallet)
    {
        $subscribe = Sejarah::where('id',$wallet->id)->get();
        $subscriptions = Sejarah::where('id', $wallet->id)->get();
        if($subscribe != NULL){
            $subscribe->delete();
        }
        if($subscriptions != NULL){
            $subscriptions->delete();
        }
        $wallet->delete();


        return redirect('sejarah.index')
                        ->with('success','Data berhasil dihapus');
    }
}
