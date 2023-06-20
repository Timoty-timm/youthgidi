<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\AnggotaPemuda;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BendaharaController extends Controller
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
      $tanggal = AnggotaPemuda::all();
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
        return view('Data-User.Bendahara.template', compact(
          'cownlakilaki','cownperempuan','cowntoli','cownbogo','cownyamo','cownyahukimo',
          'cownbintang', 'cownselatan', 'cownutara', 'pengumuman', 
          'cownjasumbas','tanggal','cownpusat','cownwilayah','cownklasis','cownpemuda'
          ))->with('count', $count);
    }
    public function show($id){
      $counts = IuranWajib::count();
      $pengumuman = Pengumuman::find($id);
      return view('Data-User.Bendahara.show', compact('pengumuman', 'counts'))->with('i', (request()->input('page', 1) - 1) * 500);
   }
    public function anggota(){
      $count = AnggotaPemuda::count();
      $anggota = AnggotaPemuda::paginate(15);
      return view('Data-User.Bendahara.Tampilan.anggota', compact('anggota','count'))->with('anggota', $anggota)->with('i', (request()->input('page', 1) - 1) * 15);
    }
    public function edit_password()
      {
          $counts = IuranWajib::count();
          return view('Data-User.Bendahara.Password.edit', compact('counts'));
      }
      // proses menganti password
      public function update_password(UpdatePasswordRequest $request)
      {
          $request->user()->update([
              'password' => Hash::make($request->get('password'))
          ]);
      
          return redirect('bpassword')->with('sukses',  'Password anda telah berhasil diubah!');
      }
    public function pusat(){
      $count = Pusat::count();
      $post = Pusat::paginate(5);
      return view('Data-User.Bendahara.Tampilan.pusat', compact('post', 'count'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function wilayah(){
      $count = Wilayah::count();
      $post = Wilayah::paginate(5);
      return view('Data-User.Bendahara.Tampilan.wilayah', compact('post', 'count'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function klasis(){
      $count = Klasis::count();
      $klasiss = Klasis::paginate();
      return view('Data-User.Bendahara.Tampilan.klasis', compact('klasiss', 'count'))->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pemuda(){
      $count = Pemuda::count();
      $pemuda = Pemuda::paginate(5);
      return view('Data-User.Bendahara.Tampilan.pemuda', compact('pemuda', 'count'))->with('pemuda', $pemuda)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function visimisi(){
      $visimisi = Visimisi::all();
      return view('Data-User.Bendahara.Tampilan.visimisi', compact('visimisi'))->with('visimisi', $visimisi)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function sejarah(){
      $sejarah = Sejarah::all();
      return view('Data-User.Bendahara.Tampilan.sejarah', compact('sejarah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function organisasi(){
      $organisasi = Organisasi::all();
      return view('Data-User.Bendahara.Tampilan.organisasi', compact('organisasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function program_pusat(){
      $pusat = Program_Pusat::all();
      return view('Data-User.Bendahara.Tampilan.program_pusat', compact('pusat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function program_wilayah(){
      $wilayah = Program_Wilayah::all();
      return view('Data-User.Bendahara.Tampilan.program_wilayah', compact('wilayah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function program_klasis(){
      $klasis = Program_Klasis::all();
      return view('Data-User.Bendahara.Tampilan.program_klasis', compact('klasis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function kegiatan(){
      $kegiatan = Kengiatan::all();
      return view('Data-User.Bendahara.Tampilan.kegiatan', compact('kegiatan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function renungan(){
      $renungan = Renungan::all();
      return view('Data-User.Bendahara.Tampilan.renungan', compact('renungan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function video(){
      $video = Video::all();
      return view('Data-User.Bendahara.Tampilan.video', compact('video'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function foto(){
      $foto = DataFoto::all();
      return view('Data-User.Bendahara.Tampilan.foto', compact('foto'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function iuran(){
      $iuran = IuranWajib::all();
      $iuran = User::all();
      return view('Data-User.Bendahara.Tampilan.iuran', compact('iuran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
