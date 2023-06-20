<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Pusat;
use App\Models\AnggotaPemuda;
use App\Models\DanaLain;
use App\Models\DataFoto;
use App\Models\IuranWajib;
use App\Models\Kengiatan;
use App\Models\Pemuda;
use App\Models\Klasis;
use App\Models\Organisasi;
use App\Models\Pengumuman;
use App\Models\Program_Klasis;
use App\Models\Program_Pusat;
use App\Models\Renungan;
use App\Models\Sejarah;
use App\Models\User;
use App\Models\Video;
use App\Models\Visimisi;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WilayahController extends Controller
{
    public function template(){
          // statik data
      $cownpusat = User::where('level', '1')->count();
      $cownwilayah = User::where('level', '2')->count();
      $cownklasis = User::where('level', '3')->count();
      $cownpemuda = User::where('level', '4')->count();
      //proses jumlah  anggota pria & wanita
    // statik wilayah
        $counts = IuranWajib::count();
        $count = AnggotaPemuda::count();
        $cownlakilaki = AnggotaPemuda::where('jk','Laki-laki')->count();
        $cownperempuan = AnggotaPemuda::where('jk','Perempuan')->count();
        $pengumuman = Pengumuman::all();
        $cowntoli = AnggotaPemuda::where('wilayah', 'Toli')->count();
        $cownbogo = AnggotaPemuda::where('wilayah', 'Bogo')->count();
        $cownyamo = AnggotaPemuda::where('wilayah', 'Yamo')->count();
        $cownbintang = AnggotaPemuda::where('wilayah', 'Pegunungan Bintang')->count();
        $cownyahukimo = AnggotaPemuda::where('wilayah', 'Yahukimo')->count();
        $cownselatan = AnggotaPemuda::where('wilayah', 'Pantai Selatan')->count();
        $cownutara = AnggotaPemuda::where('wilayah', 'Pantai Utara')->count();
        $cownjasumbas = AnggotaPemuda::where('wilayah', 'Jasumbas')->count(); 
        $post   = Wilayah::all();
        return view('Data-User.Wilayah.template', 
        compact('cownlakilaki', 'cowntoli', 'cownbogo', 'cownyamo',
         'cownjasumbas', 'counts',
        'cownperempuan', 'cownbintang','counts', 'pengumuman', 
        'cownyahukimo', 'cownselatan', 'cownutara','cownpusat','cownwilayah','cownklasis','cownpemuda'
        ))->with('count', $count)->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index(){
      
        $post   = Wilayah::all();
        return view('Data-User.Wilayah.index', )->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(){
        return view('Data-User.Wilayah.create');
    }
    public function store(Request $request){

        $post  = $request->validate([
            'nik'=>'required|unique:wilayah_tb,nik|max:20|min:5',
            'nama'=>'required|max:30|min:5',
            'masajabatan'=>'required|max:30|min:3',
            'alamat'=>'required|max:30|min:3',
        ]);
        $post           = new Wilayah;
        $post->nik    = $request->nik;
        $post->nama  = $request->nama;
        $post->masajabatan  = $request->masajabatan;
        $post->alamat  = $request->alamat;
        // $post->save() digunakan untuk menyimpan data title dan content
        $post->save();
        //digunakan untuk mengakses route post
    //    return redirect('dwilayah');

       return redirect('dwilayah')->with('sukses','Data berhasil di tambah');
    }

    public function edit($id){
        $post   = Wilayah::whereId($id)->first();
        return view('Data-User.Wilayah.edit')->with('post', $post);

    }
    public function update(Request $request, $id){

        $post  = $request->validate([
            'nik'=>'required|max:20|min:5',
            'nama'=>'required|max:30|min:5',
            // 'jk'=>'required',
            'masajabatan'=>'required|max:20|min:3',
            'alamat'=>'required|max:30|min:3',
        ]);

        $post           = Wilayah::find($id);
        $post->nik    = $request->nik;
        $post->nama  = $request->nama;
        // $post->jk  = $request->jk;
        $post->masajabatan  = $request->masajabatan;
        $post->alamat  = $request->alamat;
        $post->save();

        //return redirect('dwilayah');
        return redirect('dwilayah')->with('sukses','Data berhasil di ubah');

    }

    public function destroy(Wilayah $post)
    {
        $post->delete();

        return redirect()->route('wilayah/index')
                        ->with('success','Data  deleted successfully');
    }
    public function pusat(){
        $post = Pusat::all();
        return view('Data-User.Wilayah.Tampilan.pusat')->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function klasis(){
        $klasiss = Klasis::all();
        return view('Data-User.Wilayah.Tampilan.klasis')->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pemuda(){
        $pemuda = Pemuda::all();
        return view('Data-User.Wilayah.Tampilan.pemuda')->with('pemuda', $pemuda)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function anggota(){
        $anggota = AnggotaPemuda::paginate(15);
        return view('Data-User.Wilayah.Tampilan.anggota')->with('anggota', $anggota)->with('i', (request()->input('page', 1) - 1) * 15);
    }
    public function visimisi(){
        $visimisi = Visimisi::all();
        return view('Data-User.Wilayah.Tampilan.visimisi')->with('visimisi', $visimisi)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function organisasi(){
        $organisasi = Organisasi::all();
        return view('Data-User.Wilayah.Tampilan.organisasi')->with('organisasi', $organisasi)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function sejarah(){
        $sejarah = Sejarah::all();
        return view('Data-User.Wilayah.Tampilan.sejarah')->with('sejarah', $sejarah)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function kegiatan(){
        $kegiatans = Kengiatan::all();
       return view('Data-User.Wilayah.Tampilan.kegiatan', compact('kegiatans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function programklasis(){

        $program = Program_Klasis::all();
       return view('Data-User.Wilayah.Tampilan.programklasis', compact('program'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function programpusat(){

        $pusat = Program_Pusat::all();
       return view('Data-User.Wilayah.Tampilan.programpusat', compact('pusat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function renungan(){

        $renungan = Renungan::all();
       return view('Data-User.Wilayah.Tampilan.renungan', compact('renungan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function foto(){

        $galeri = DataFoto::all();
       return view('Data-User.Wilayah.Tampilan.foto', compact('galeri'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function video(){

        $video = Video::all();
       return view('Data-User.Wilayah.Tampilan.video', compact('video'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($id){
        $counts = IuranWajib::count();
        $pengumuman = Pengumuman::find($id);
        return view('Data-User.Wilayah.show', compact('pengumuman', 'counts'))->with('i', (request()->input('page', 1) - 1) * 500);
     }
    public function form_iuran(){

        return view('Data-User.Wilayah.Tampilan.form_iuran')->with('i', (request()->input('page', 1) - 1) * 5);
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
      
          return redirect('wiuran')
                          ->with('success','Data berhasil di tambah');
      }
      public function edit_password()
      {
          $counts = IuranWajib::count();
          return view('Data-User.Wilayah.Password.edit', compact('counts'));
      }
      // proses menganti password
      public function update_password(UpdatePasswordRequest $request)
      {
          $request->user()->update([
              'password' => Hash::make($request->get('password'))
          ]);
      
          return redirect('wpassword')->with('sukses',  'Password anda telah berhasil diubah!');
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
        return view('Data-User.Wilayah.Tampilan.danalain', compact(
          'keuangan',
          'pemasukan',
            'pengeluaran', 
                 'saldo',
                 'pemasukan1', 
                  'pengeluaran1',
                  'counts'
          ))->with('danalain', $danalain)->with('i', (request()->input('page', 1) - 1) * 5);
      }
 
}
