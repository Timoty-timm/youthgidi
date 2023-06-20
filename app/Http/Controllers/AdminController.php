<?php

namespace App\Http\Controllers;
use App\Models\Pemuda;
use App\Models\Klasis;
use App\Models\Wilayah;
use App\Models\Pusat;
use App\Models\AnggotaPemuda;
use App\Models\DanaLain;
use App\Models\IuranWajib;
use App\Models\Pengumuman;
use App\Models\Program_Klasis;
use App\Models\Program_Pusat;
use App\Models\Program_Wilayah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
 use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class AdminController extends Controller
{
  public function index(){
    
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
    return view('Data-Admin.sekertaris.admin',
     compact('cownlakilaki', 'cowntoli', 'cownbogo', 'cownyamo', 'cownjasumbas',
     'cownperempuan', 'cownbintang','counts', 'pengumuman', 'cownyahukimo', 
     'cownselatan', 'cownutara','cownpusat','cownwilayah','cownklasis','cownpemuda'
     ))->with('count', $count);
  }
  public function show($id){
    $counts = IuranWajib::count();
    $pengumuman = Pengumuman::find($id);
    return view('Data-Admin.Pengumuman.show', compact('pengumuman', 'counts'))->with('i', (request()->input('page', 1) - 1) * 500);
 }

  public function pusat(){
    $counts = IuranWajib::count();
    $post = Pusat::all();
    return view('Data-Admin.sekertaris.Tampilan.pusat', compact('counts'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function template(){
  $counts = IuranWajib::count();
  return view('Data-Admin.sekertaris.template', compact('counts'));
}
public function wilayah(){
  $counts = IuranWajib::count();
    $post = Wilayah::all();
    return view('Data-Admin.sekertaris.Tampilan.wilayah', compact('counts'))->with('post', $post)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function klasis(){
  $counts = IuranWajib::count();
    $klasiss = Klasis::all();
    return view('Data-Admin.sekertaris.Tampilan.klasis', compact('counts'))->with('klasiss', $klasiss)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function pemuda(){
  $counts = IuranWajib::count();
    $pemuda = Pemuda::all();
    return view('Data-Admin.sekertaris.Tampilan.pemuda', compact('counts'))->with('pemuda', $pemuda)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function anggota(){
  $counts = IuranWajib::count();
  $anggota = AnggotaPemuda::paginate(15);
  return view('Data-Admin.sekertaris.Tampilan.anggota', compact('counts', 'anggota'))->with('i', (request()->input('page', 1) - 1) * 15);
}
public function iuran( IuranWajib $request){
  $counts = IuranWajib::count();
  // $iuran = IuranWajib::all();

  $iuran = FacadesDB::table('iuran_wajib')
  ->join('users', 'iuran_wajib.id', '=', 'users.id')
  ->select('iuran_wajib.*', 'users.name')-> latest()->paginate(5);
  return view('Data-Admin.sekertaris.Tampilan.iuran', compact('counts'))->with('iuran', $iuran)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function show_iuran($id){
 $iuran = IuranWajib::find($id);
return view('Data-Admin.sekertaris.Tampilan.show_iuran', compact('iuran'));
}
public function programpusat(){
  $counts = IuranWajib::count();
  $program_pusat = Program_Pusat::all();
  return view('Data-Admin.sekertaris.Tampilan.programpusat', compact('counts'))->with('program_pusat', $program_pusat)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function programwilayah(){
  $counts = IuranWajib::count();
  $program_wilayah = Program_Wilayah::all();
  return view('Data-Admin.sekertaris.Tampilan.programwilayah', compact('counts'))->with('program_wilayah', $program_wilayah)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function programklasis(){
  $counts = IuranWajib::count();
  $program_klasis = Program_Klasis::all();
  return view('Data-Admin.sekertaris.Tampilan.programklasis', compact('counts'))->with('program_klasis', $program_klasis)->with('i', (request()->input('page', 1) - 1) * 5);
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
  return view('Data-Admin.sekertaris.Tampilan.danalain', compact(
    'keuangan',
    'pemasukan',
      'pengeluaran', 
           'saldo',
           'pemasukan1', 
            'pengeluaran1',
            'counts'
    ))->with('danalain', $danalain)->with('i', (request()->input('page', 1) - 1) * 5);
}
public function destroy(IuranWajib $siuranb)
{
    $siuranb->delete();
    return redirect('siuran')
                    ->with('success','Data berhasil dihapus');

    }
}
    