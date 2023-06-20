<?php

namespace App\Http\Controllers;

use App\Models\BeritaTerbaru;
use App\Models\IuranWajib;
use Illuminate\Contracts\Validation\Rule;
//use Validator;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Validator;
class BeritaTerbaruController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $berita = BeritaTerbaru::latest()->paginate(5);
        return view('Data-Admin.Berita-Terbaru.index',compact('berita', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Berita-Terbaru.create', compact('counts'));
    }
    public function store(Request $request)
    {
       $input =  $request->validate([
            'judul' => 'required',
            'isi' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        BeritaTerbaru::create($input);
        return redirect('berita-terbaru')->with('success','Data berhasil di tambah');
    }
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $berita = BeritaTerbaru::find($id);
        return view('Data-Admin.Berita-Terbaru.edit',compact('berita', 'counts'));
    }
    public function update(Request $request, $id)
    {
       $update = [
            'judul' => $request->judul,
            'isi' =>  $request->isi,
        ];
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }else{
            unset($update['image']);
        }
        BeritaTerbaru::where('id', $id)->update($update);
        return redirect('berita-terbaru')->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $berita = BeritaTerbaru::find($id);
        $berita->delete();
        return redirect('berita-terbaru')->with('success','Data berhasil dihapus');
    }
}
