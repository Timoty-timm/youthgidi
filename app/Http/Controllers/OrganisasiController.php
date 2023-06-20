<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $organisasi = Organisasi::latest()->paginate(5);

        return view('Data-Admin.profil.Organisasi.index',compact('organisasi','counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.profil.Organisasi.create', compact('counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Organisasi::create($input);
        return redirect()->route('organisasi.index')
                        ->with('success','Data berhasil di tambah');
    }

    public function edit($id)
    {
        $counts = IuranWajib::count();
        $organisasi = Organisasi::find($id);
        return view('Data-Admin.profil.Organisasi.edit',compact('organisasi', 'counts'));
    }

    public function update(Request $request, $id)
    {
        $update = [
            'image' => $request->image,
        ];
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }else{
            unset($update['image']);
        }

        Organisasi::where('id', $id)->update($update);
        return redirect()->route('organisasi.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::find($id);
        $organisasi->delete();
        return redirect()->route('organisasi.index')
                        ->with('success','Data berhasil dihapus');
    }
}
