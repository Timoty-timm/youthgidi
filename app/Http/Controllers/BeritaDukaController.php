<?php

namespace App\Http\Controllers;

use App\Models\BeritaDuka;
use App\Models\IuranWajib;
use Illuminate\Http\Request;

class BeritaDukaController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $products = BeritaDuka::latest()->paginate(5);

        return view('Data-Admin.Berita-Duka.index',compact('products', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Berita-Duka.create', compact('counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        BeritaDuka::create($input);

        return redirect()->route('berita-duka.index')
                        ->with('success','Data berhasil di tambah');
    }

    public function edit($id)
    {
        $counts = IuranWajib::count();
        $berita_duka = BeritaDuka::find($id);
        return view('Data-Admin.Berita-Duka.edit',compact('berita_duka', 'counts'));
    }

    public function update(Request $request, $id)
    {
        $update = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }else{
            unset($update['image']);
        }

        BeritaDuka::where('id', $id)->update($update);

        return redirect()->route('berita-duka.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $berita_duka = BeritaDuka::find($id);
        $berita_duka->delete();
        return redirect()->route('berita-duka.index')
                        ->with('success','Data berhasil dihapus');
    }
}
