<?php

namespace App\Http\Controllers;

use App\Models\DataFoto;
use App\Models\IuranWajib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataFotoController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $foto = DataFoto::latest()->paginate(5);

        return view('Data-Admin.Foto.index',compact('foto', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Foto.create', compact('counts'));
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

        DataFoto::create($input);

        return redirect()->route('foto.index')
                        ->with('success','Data berhasil di tambah');
    }

    // public function show(BeritaDuka $product)
    // {
    //     return view('Berita-Duka.show',compact('product'));
    // }
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $foto = DataFoto::find($id);
        return view('Data-Admin.Foto.edit',compact('foto', 'counts'));
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

        DataFoto::where('id', $id)->update($update);

        return redirect()->route('foto.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $foto = DataFoto::find($id);
        $foto->delete();
        return redirect()->route('foto.index')
                        ->with('success','Data berhasil dihapus');
    }
}
