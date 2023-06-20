<?php

namespace App\Http\Controllers;

use App\Models\DataUlangTahun;
use App\Models\IuranWajib;
use Illuminate\Http\Request;

class DataUlangTahunController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $ulang = DataUlangTahun::latest()->paginate(5);

        return view('Data-Admin.Ulang-Tahun.index',compact('ulang', 'counts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Ulang-Tahun.create', compact('counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        DataUlangTahun::create($input);
        return redirect()->route('ulang.index')
                        ->with('success','Data berhasil di tambah');
    }

    public function edit($id)
    {
        $counts = IuranWajib::count();
        $ulang = DataUlangTahun::find($id);
        return view('Data-Admin.Ulang-Tahun.edit',compact('ulang', 'counts'));
    }

    public function update(Request $request, $id)
    {
        $update = [
            'nama' => $request->nama,
        ];
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }else{
            unset($update['image']);
        }

        DataUlangTahun::where('id', $id)->update($update);
        return redirect()->route('ulang.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $ulang = DataUlangTahun::find($id);
        $ulang->delete();
        return redirect()->route('ulang.index')
                        ->with('success','Data berhasil dihapus');
    }
}
