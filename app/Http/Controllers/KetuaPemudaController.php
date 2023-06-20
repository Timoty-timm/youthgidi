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
use App\Models\Program_Pusat;
use App\Models\Program_Wilayah;
use App\Models\Pusat;
use App\Models\Renungan;
use App\Models\Sejarah;
use App\Models\User;
use App\Models\Video;
use App\Models\Visimisi;
use App\Models\Wilayah;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KetuaPemudaController extends Controller
{
    public function template(){
         // statik data
      $cownpusat = User::where('level', '1')->count();
      $cownwilayah = User::where('level', '2')->count();
      $cownklasis = User::where('level', '3')->count();
      $cownpemuda = User::where('level', '4')->count();
      //proses jumlah  anggota pria & wanita
    // statik wilayah
        $count = AnggotaPemuda::count();
        $cownlakilaki = AnggotaPemuda::where('jk','Laki-laki')->count();
        $cownperempuan = AnggotaPemuda::where('jk','Perempuan')->count();
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::all();
        $cowntoli = AnggotaPemuda::where('wilayah', 'Toli')->count();
        $cownbogo = AnggotaPemuda::where('wilayah', 'Bogo')->count();
        $cownyamo = AnggotaPemuda::where('wilayah', 'Yamo')->count();
        $cownbintang = AnggotaPemuda::where('wilayah', 'Pegunungan Bintang')->count();
        $cownyahukimo = AnggotaPemuda::where('wilayah', 'Yahukimo')->count();
        $cownselatan = AnggotaPemuda::where('wilayah', 'Pantai Selatan')->count();
        $cownutara = AnggotaPemuda::where('wilayah', 'Pantai Utara')->count();
        $cownjasumbas = AnggotaPemuda::where('wilayah', 'Jasumbas')->count();
         return view('Data-User.Pemuda.template', compact(
            'cownlakilaki', 'cowntoli', 'cownbogo', 'cownyamo', 'cownjasumbas', 'counts',
        'cownperempuan', 'cownbintang','counts', 'pengumuman', 'cownyahukimo', 'cownselatan',
         'cownutara','cownpusat','cownwilayah','cownklasis','cownpemuda'
            ))->with('count', $count);
    }
    public function index(){

        $post   = Pemuda::all();
        return view('Data-User.Pemuda.index')->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($id){
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::find($id);
        return view('Data-User.Pemuda.show', compact('pengumuman', 'counts'))->with('i', (request()->input('page', 1) - 1) * 500);
     }
    public function create(){
        return view('Data-User.Pemuda.create');
    }
    public function store(Request $request){

        $post  = $request->validate([
            'nik'=>'required|unique:wilayah_tb,nik|max:20|min:5',
            'nama'=>'required|max:30|min:5',
            'masajabatan'=>'required|max:30|min:3',
            'alamat'=>'required|max:30|min:3',
        ]);
        $post           = new Pemuda();
        $post->nik    = $request->nik;
        $post->nama  = $request->nama;
        $post->masajabatan  = $request->masajabatan;
        $post->alamat  = $request->alamat;
        // $post->save() digunakan untuk menyimpan data title dan content
        $post->save();
        //digunakan untuk mengakses route post
       return redirect('ketua-pemuda')->with('sukses','Data berhasil di tambah');
    }

    public function edit($id){
        $post   = Pemuda::whereId($id)->first();
        return view('Data-User.Pemuda.edit')->with('post', $post);

    }
    
    public function update(Request $request, $id, User $username){
        $post  = $request->validate([
            'nik'=>'required|max:20|min:5',
            'nama'=>'required|max:30|min:5',
            'masajabatan'=>'required|max:20|min:3',
            'alamat'=>'required|max:30|min:3',
            
        ]);

    // Validasi input jika diperlukan

    // Cari data berdasarkan ID
    $post = User::find($username);
    $post = User::where('username', $username)->first();

    // Periksa apakah data dengan ID tersebut ada
    if ($post && $post->username === $post) {
        // Update data dengan nilai baru dari input
        $post->username = $request->input('username');
        $post->username = $request->input('username');
        // Lanjutkan untuk setiap field yang ingin Anda update
        $post           = Pemuda::find($id);
        $post->nik    = $request->nik;
        $post->nama  = $request->nama;
        $post->masajabatan  = $request->masajabatan;
        $post->alamat  = $request->alamat;
        // Simpan perubahan
        $post->save();

        // Tambahkan pesan sukses jika perlu
        return redirect('ketua-pemuda')->with('sukses', 'Data berhasil diupdate.');
    } else {
        // Tambahkan pesan error jika perlu
        return redirect('ketua-pemuda')->with('sukses', 'Data tidak ditemukan.');
    }

       
        // $post->save();
        // return redirect()->route('ketua-pemuda.index')->with('sukses','Data berhasil di ubah');
        
    }

    public function destroy(Pemuda $post)
    {
        $post->delete();

        return redirect()->route('ketua-pemuda.index')->with('sukses','Data  deleted successfully');
    }
//    Tampilkan User
    public function pusat(){
        $post = Pusat::all();
        return view('Data-User.Pemuda.Tampilan.pusat')->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function wilayah(){
        $post = Wilayah::all();
        return view('Data-User.Pemuda.Tampilan.wilayah')->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function klasis(){
        $klasiss = Klasis::all();
        return view('Data-User.Pemuda.Tampilan.klasis')->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function anggota(){
        $anggota = AnggotaPemuda::all();
        return view('Data-User.Pemuda.Tampilan.anggota')->with('anggota', $anggota)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function visimisi(){
        $visimisi = Visimisi::all();
        return view('Data-User.Pemuda.Tampilan.visimisi')->with('visimisi', $visimisi)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function organisasi(){
        $organisasi = Organisasi::all();
        return view('Data-User.Pemuda.Tampilan.organisasi')->with('organisasi', $organisasi)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function sejarah(){
        $sejarah = Sejarah::all();
        return view('Data-User.Pemuda.Tampilan.sejarah')->with('sejarah', $sejarah)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function programpusat(){
        $pusat = Program_Pusat::all();
        return view('Data-User.Pemuda.Tampilan.programpusat')->with('pusat', $pusat)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function programwilayah(){
        $wilayah = Program_Wilayah::all();
        return view('Data-User.Pemuda.Tampilan.programwilayah')->with('wilayah', $wilayah)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function programklasis(){
        $klasis = Program_Klasis::all();
        return view('Data-User.Pemuda.Tampilan.programklasis')->with('klasis', $klasis)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function foto(){
        $foto = DataFoto::all();
        return view('Data-User.Pemuda.Tampilan.foto')->with('foto', $foto)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function renungan(){
        $renungan = Renungan::all();
        return view('Data-User.Pemuda.Tampilan.renungan')->with('renungan', $renungan)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function kegiatan(){
        $kegiatan = Kengiatan::all();
        return view('Data-User.Pemuda.Tampilan.kegiatan')->with('kegiatan', $kegiatan)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function danalain(){
        $counts = IuranWajib::count();
        $danalain = DanaLain::all();
        $keuangan = DanaLain::all();
          $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
          $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');
          $pemasukan1 = DanaLain::where('jenis', 'pemasukan')->get();
          $pengeluaran1 = DanaLain::where('jenis', 'pengeluaran')->get();
          $saldo = $pemasukan - $pengeluaran;
        return view( 'Data-User.Pemuda.Tampilan.danalain' , compact(
          'keuangan',
          'pemasukan',
            'pengeluaran', 
                 'saldo',
                 'pemasukan1', 
                  'pengeluaran1',
                  'counts'
          ))->with('danalain', $danalain)->with('i', (request()->input('page', 1) - 1) * 5);
      }
    public function video(){
        $video = Video::all();
        return view('Data-User.Pemuda.Tampilan.video')->with('video', $video)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function form_iuran(){

        return view('Data-User.Pemuda.form_iuran')->with('i', (request()->input('page', 1) - 1) * 5);
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
      
          return redirect('piuran')
                          ->with('success','Data berhasil di tambah');
      }
      public function edit_password()
      {
          $counts = IuranWajib::count();
          return view('Data-User.Pemuda.Password.edit', compact('counts'));
      }
      // proses menganti password
      public function update_password(UpdatePasswordRequest $request)
      {
          $request->user()->update([
              'password' => Hash::make($request->get('password'))
          ]);
      
          return redirect('ppassword')->with('sukses',  'Password anda telah berhasil diubah!');
      }
}
