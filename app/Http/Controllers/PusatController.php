<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\AnggotaPemuda;
use App\Models\DanaLain;
use App\Models\DataFoto;
use App\Models\IuranWajib;
use App\Models\Kengiatan;
use App\Models\Klasis;
use App\Models\Organisasi;
use App\Models\Pemuda;
use App\Models\Pengumuman;
use App\Models\Program_Klasis;
use App\Models\Program_Wilayah;
use App\Models\Pusat;
use App\Models\Renungan;
use App\Models\Sejarah;
use App\Models\User;
use App\Models\Video;
use App\Models\Visimisi;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PusatController extends Controller
{
    public function template(){
      // statik data
      $cownpusat = User::where('level', '1')->count();
      $cownwilayah = User::where('level', '2')->count();
      $cownklasis = User::where('level', '3')->count();
      $cownpemuda = User::where('level', '4')->count();
      //proses jumlah  anggota pria & wanita
    // statik wilayah
      $pengumuman = Pengumuman::all();
      $counts = IuranWajib::count();
      $count = AnggotaPemuda::count();
      $cownlakilaki = AnggotaPemuda::where('jk','Laki-laki')->count();
      $cownperempuan = AnggotaPemuda::where('jk','Perempuan')->count();   
      $cowntoli = AnggotaPemuda::where('wilayah', 'Toli')->count();
      $cownbogo = AnggotaPemuda::where('wilayah', 'Bogo')->count();
      $cownyamo = AnggotaPemuda::where('wilayah', 'Yamo')->count();
      $cownbintang = AnggotaPemuda::where('wilayah', 'Pegunungan Bintang')->count();
      $cownyahukimo = AnggotaPemuda::where('wilayah', 'Yahukimo')->count();
      $cownselatan = AnggotaPemuda::where('wilayah', 'Pantai Selatan')->count();
      $cownutara = AnggotaPemuda::where('wilayah', 'Pantai Utara')->count();
      $cownjasumbas = AnggotaPemuda::where('wilayah', 'Jasumbas')->count();    
        return view('Data-User.Pusat.template',
         compact(
         'cownlakilaki', 'cowntoli', 'cownbogo', 'cownyamo', 'cownjasumbas', 'counts',
     'cownperempuan', 'cownbintang','counts', 'pengumuman', 'cownyahukimo', 
     'cownselatan', 'cownutara','cownpusat','cownwilayah','cownklasis','cownpemuda'
         ))->with('count', $count);
      }
    public function index(){
        $post = Pusat::all();
        return view('Data-User.Pusat.index', compact('post'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
      }
      public function create(){
        return view('Data-User.Pusat.create');
      }
      public function store(Request $request){
      $post  = $request->validate([
        'nik'=>'required|unique:_pusat_tb,nik|max:20|min:5',
        'nama'=>'required|max:30|min:5',
        'masajabatan'=>'required|max:30|min:3',
        'alamat'=>'required|max:30|min:3',
    ]);
    $post           = new Pusat;
    $post->nama  = $request->nama;
    $post->nik  = $request->nik;
    $post->masajabatan  = $request->masajabatan;
    $post->alamat  = $request->alamat;
    // $post->save() digunakan untuk menyimpan data title dan content
    $post->save();
    //digunakan untuk mengakses route post
   //return redirect('pusat');
   return redirect('ketua-pusat')->with('sukses','Data berhasil di tambah');
}
public function show_pengumuman($id){
  $pengumuman = Pengumuman::find($id);
  return view('Data-User.Pusat.Tampilan.show_pengumuman', compact('pengumuman'))->with('i', (request()->input('page', 1) - 1) * 5);
}
public function edit($id){
    $post   = Pusat::whereId($id)->first();
        return view('Data-User.Pusat.edit')->with('post', $post);
}
public function update(Request $request, $id){

    $post  = $request->validate([
      'nik'=>'required|max:20|min:5',
      'nama'=>'required|max:30|min:5',
      'masajabatan'=>'required|max:30|min:3',
      'alamat'=>'required|max:30|min:3',
    ]);

    $post           = Pusat::find($id);
    $post->nik    = $request->nik;
    $post->nama  = $request->nama;
    // $post->jk  = $request->jk;
    $post->masajabatan  = $request->masajabatan;
    $post->alamat  = $request->alamat;
    $post->save();

   // return redirect('pusat');
  return redirect('ketua-pusat')->with('sukses','Data berhasil di ubah');
}
//    Tampilkan User
public function wilayah(){
  $post = Wilayah::all();
  return view('Data-User.Pusat.Tampilan.wilayah')->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function klasis(){
  $klasiss = Klasis::all();
  return view('Data-User.Pusat.Tampilan.klasis')->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function pemuda(){
  $pemuda = Pemuda::all();
  return view('Data-User.Pusat.Tampilan.pemuda')->with('pemuda', $pemuda)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function anggota(){
  $anggota = AnggotaPemuda::all();
  return view('Data-User.Pusat.Tampilan.anggota')->with('anggota', $anggota)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function visimisi(){
  $visimisi = Visimisi::all();
  return view('Data-User.Pusat.Tampilan.visimisi')->with('visimisi', $visimisi)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function struktur(){
  $struktur = Organisasi::all();
  return view('Data-User.Pusat.Tampilan.struktur')->with('struktur', $struktur)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function sejarah(){
  $sejarah = Sejarah::all();
  return view('Data-User.Pusat.Tampilan.sejarah')->with('sejarah', $sejarah)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function danalain(){
  $counts = IuranWajib::count();
  $danalain = DanaLain::all();;
  $keuangan = DanaLain::all();
    $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
    $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');
    $pemasukan1 = DanaLain::where('jenis', 'pemasukan')->get();
    $pengeluaran1 = DanaLain::where('jenis', 'pengeluaran')->get();
    $saldo = $pemasukan - $pengeluaran;
  return view('Data-User.Pusat.Tampilan.danalain',
  compact(
  'keuangan',
    'pemasukan',
      'pengeluaran', 
           'saldo',
           'pemasukan1', 
            'pengeluaran1',
            'counts'))->with('danalain', $danalain)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function wprogram(){
  $program = Program_Wilayah::all();
  return view('Data-User.Pusat.Tampilan.wprogram')->with('program', $program)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function kprogram(){
  $program = Program_Klasis::all();
  return view('Data-User.Pusat.Tampilan.kprogram')->with('program', $program)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function kegiatan(){
  $kegiatan = Kengiatan::all();
  return view('Data-User.Pusat.Tampilan.kegiatan')->with('kegiatan', $kegiatan)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function galeri(){
  $galeri = DataFoto::all();
  return view('Data-User.Pusat.Tampilan.galeri')->with('galeri', $galeri)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function renungan(){
  $renungan = Renungan::all();
  return view('Data-User.Pusat.Tampilan.renungan')->with('renungan', $renungan)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function video(){
  $video = Video::all();
  return view('Data-User.Pusat.Tampilan.video')->with('video', $video)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function form_iuran(){
  return view('Data-User.Pusat.Tampilan.form_iuran')->with('i', (request()->input('page', 1) - 1) * 5);
}
public function store_iuran(Request $request)
{

    $request->validate([
         
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

    return redirect('dataiuran')
                    ->with('success','Data berhasil di tambah');
}
public function edit_password()
{
    $counts = IuranWajib::count();
    return view('Data-User.Pusat.Password.edit', compact('counts'));
}
// proses menganti password
public function update_password(UpdatePasswordRequest $request)
{
    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect('datapassword')->with('sukses',  'Password anda telah berhasil diubah!');
}


}

