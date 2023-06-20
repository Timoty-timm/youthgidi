<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPemuda;
use App\Models\BeritaDuka;
use App\Models\BeritaTerbaru;
use App\Models\Wilayah;
use App\Models\Carousel;
use App\Models\DanaLain;
use App\Models\DataFoto;
use App\Models\DataUlangTahun;
use App\Models\Visimisi;
use App\Models\Sejarah;
use App\Models\Renungan;
use App\Models\Program_Klasis;
use App\Models\Program_Wilayah;
use App\Models\IuranWajib;
use App\Models\Kengiatan;
use App\Models\Organisasi;
use App\Models\Profile_Ketua;
use App\Models\Program_Pusat;
use App\Models\UploadProfile;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserUmumController extends Controller
{
    public function index(){
        $count = AnggotaPemuda::count();
        $cownlakilaki = AnggotaPemuda::where('jk','Laki-laki')->count();
        $cownperempuan = AnggotaPemuda::where('jk','Perempuan')->count();
        $corousel = Carousel::all();
        $duka = BeritaDuka::all();
        $ulangtahun = DataUlangTahun::all();
        $berita = BeritaTerbaru::all();
        $profile = UploadProfile::all();
        $profil = Profile_Ketua::all();
        return view('Home.home', compact(
        'corousel',
         'cownlakilaki',
         'duka',
         'profile',
         'profil',
         'berita', 
         'ulangtahun',
         'cownperempuan'))->with('count', $count)
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function wilayah(){
        $post = Wilayah::all();
        return view('Tampilan-User.wilayah', compact('post'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function visimisi(){
        $corousel = Carousel::all();
        $visimisi = Visimisi::all();
        return view('Tampilan-User.visimisi', compact('visimisi', 'corousel'))->with('visimisi', $visimisi)->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function sejarah(){
        $corousel = Carousel::all();
        $sejarah = Sejarah::all();
        return view('Tampilan-User.sejarah', compact('sejarah','corousel'))->with('sejarah', $sejarah)->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function organisasi(){
        $corousel = Carousel::all();
        $organisasi = Organisasi::all();
        return view('Tampilan-User.organisasi', compact('organisasi', 'corousel'))->with('organisasi', $organisasi)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function renungan(){
        $corousel = Carousel::all();
        $renungan = Renungan::all();
        return view('Tampilan-User.renungan', compact('renungan','corousel'))->with('renungan', $renungan)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function program_klasis(){
        $corousel = Carousel::all();
        $program_klasis = Program_klasis::all();
        return view('Tampilan-User.program_klasis', compact('program_klasis', 'corousel'))->with('program_klasis', $program_klasis)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function program_wilayah(){
        $corousel = Carousel::all();
        $program_wilayah = Program_Wilayah::all();
        return view('Tampilan-User.program_wilayah', compact('program_wilayah','corousel'))->with('program_wilayah', $program_wilayah)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function program_pusat(){
        $corousel = Carousel::all();
         $program_pusat = Program_Pusat::all();
        return view('Tampilan-User.program_pusat', compact('program_pusat', 'corousel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function iuran(){
        $corousel = Carousel::all();
        // $iuran = IuranWajib::all();
        $iuran = DB::table('iuran_wajib')
        ->join('users', 'iuran_wajib.id', '=', 'users.id')
        ->select('iuran_wajib.*', 'users.name')-> latest()->paginate(5);
        return view('Tampilan-User.iuran', compact('iuran', 'corousel'))->with('iuran', $iuran)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function kegiatan(){
        $corousel = Carousel::all();
        $kegiatans = Kengiatan::all();
       return view('Tampilan-User.kegiatan', compact('kegiatans', 'corousel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function foto(){
        $corousel = Carousel::all();
        $galeri = DataFoto::all();
       return view('Tampilan-User.foto', compact('galeri','corousel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function video(){
        $corousel = Carousel::all();
        $video = Video::all();
       return view('Tampilan-User.video', compact('video','corousel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function danalain(){

     $corousel = Carousel::all();
        $keuangan = DanaLain::all();
        $pemasukan = DanaLain::where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = DanaLain::where('jenis', 'pengeluaran')->sum('jumlah');
        $pemasukan1 = DanaLain::where('jenis', 'pemasukan')->get();
        $pengeluaran1 = DanaLain::where('jenis', 'pengeluaran')->get();
        $saldo = $pemasukan - $pengeluaran;
        return view('Tampilan-User.danalain', compact(
            'keuangan','pemasukan', 'pengeluaran', 
            'saldo','pemasukan1', 'pengeluaran1','corousel'
        ));
    }
    
  
    public function template_user(){
        $corousel = Carousel::all(); 
      return view('Tampilan-User.template-user', compact('corousel'));
    }

}
