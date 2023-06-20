<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\IuranWajib;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
class IuranWajibController extends Controller
{
    public function index(){
        $iuran = User::all();
        // $iuran = IuranWajib::paginate(10);
        $iuran = FacadesDB::table('iuran_wajib')
        ->join('users', 'iuran_wajib.id', '=', 'users.id')
        ->select('iuran_wajib.*', 'users.name')-> latest()->paginate(10);
        return view('Data-Admin.Iuran-Wajib.index',compact('iuran'))->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function create()
    {
        return view('Data-Admin.Iuran-Wajib.create');
    
    }
    public function store(Request $request)
    {

        $request->validate([
            // 'nama' => 'required',
            'wilayah' => 'required',
            'nominal' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        IuranWajib::create($input);

        return redirect()->route('iuran.index')
                        ->with('success','Data berhasil di tambah');
    }


    public function edit(IuranWajib $iuran)
    {
        // $iuran = IuranWajib::find($id);
        return view('Data-Admin.Iuran-Wajib.edit',compact('iuran'));
    }

    public function update(Request $request,  IuranWajib $iuran){

        $request->validate([
            // 'nama' => 'required',
            'wilayah' => 'required',
            'nominal' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $iuran->update($input);
          return redirect()->route('iuran.index')->with('success','Data berhasil diubah');
    }

    public function destroy(IuranWajib $iuran)
{
    $iuran->delete();
    return redirect()->route('iuran.index')
                    ->with('success','Data berhasil dihapus');

    }
}
