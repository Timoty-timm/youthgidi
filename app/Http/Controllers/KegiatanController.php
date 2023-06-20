<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Kengiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $kegiatan = Kengiatan::latest()->paginate(5);

        return view('Data-Admin.Kegiatan.index',compact('kegiatan', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Kegiatan.create', compact('counts'));
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

        Kengiatan::create($input);

        return redirect()->route('kegiatan.index')
                        ->with('success','Data berhasil di tambah');
    }

    // public function show(BeritaDuka $product)
    // {
    //     return view('Berita-Duka.show',compact('product'));
    // }
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $kegiatan = Kengiatan::find($id);
        return view('Data-Admin.Kegiatan.edit',compact('kegiatan', 'counts'));
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

        Kengiatan::where('id', $id)->update($update);

        return redirect()->route('kegiatan.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $kegiatan = Kengiatan::find($id);
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
