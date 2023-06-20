<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Profile_Ketua;
use App\Models\UploadProfile;
use Illuminate\Http\Request;

class UploadProfileController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $profil = UploadProfile::latest()->paginate(5);
        $profile = Profile_Ketua::latest()->paginate(5);
        return view('Data-Admin.Upload-Profil.index',compact('profil','counts', 'profile'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Upload-Profil.create', compact('counts'));
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

        UploadProfile::create($input);

        return redirect()->route('profile.index')
                        ->with('success','Data berhasil di tambah');
    }

    // public function show(BeritaDuka $product)
    // {
    //     return view('Berita-Duka.show',compact('product'));
    // }
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $profil = UploadProfile::find($id);
        return view('Data-Admin.Upload-Profil.edit',compact('profil', 'counts'));
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

        UploadProfile::where('id', $id)->update($update);

        return redirect()->route('profile.index')
                        ->with('success','Data berhasil di ubah');
    }

    public function destroy($id)
    {
        $profil = UploadProfile::find($id);
        $profil->delete();
        return redirect()->route('profile.index')
                        ->with('success','Data berhasil dihapus');
    }
    public function create_ketua()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Profile-Ketua.create_ketua', compact('counts'));
    }
    public function store_ketua(Request $request)
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

        Profile_Ketua::create($input);

        return redirect('sprofile')
                        ->with('success','Data berhasil di tambah');
    }
    public function edit_ketua($id)
    {
        $counts = IuranWajib::count();
        $profil = Profile_Ketua::find($id);
        return view('Data-Admin.Profile-Ketua.edit_ketua',compact('profil', 'counts'));
    }
    public function update_ketua(Request $request, $id)
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

        Profile_Ketua::where('id', $id)->update($update);

        return redirect('sprofile')
                        ->with('success','Data berhasil diubah');
    }

}
