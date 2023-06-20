<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PusatController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AllDataController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Program_PusatController;
use App\Http\Controllers\Program_WilayahController;
use App\Http\Controllers\Program_KlasisController;
use App\Http\Controllers\KlasisController;
use App\Http\Controllers\UserUmumController;
use App\Http\Controllers\TampilanUserController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\StrukturWilayahController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\BeritaDukaController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\IuranWajibController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KetuaPemudaController;
use App\Http\Controllers\DanaLainController;
use App\Http\Controllers\BeritaTerbaruController;
use App\Http\Controllers\UploadProfileController;
use App\Http\Controllers\DataFotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DataUlangTahunController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\PengumumanController;



//tampilan depa




// URL login, lagout dan ganti password
Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    //URL tampilan user umum
Route::get('/', [App\Http\Controllers\UserUmumController::class, 'index']);
// Route::resource('/', UserUmumController::class);
Route::get('user-vimisi', [App\Http\Controllers\UserUmumController::class, 'visimisi']);
Route::get('user-sejarah', [App\Http\Controllers\UserUmumController::class, 'sejarah']);
Route::get('user-renungan', [App\Http\Controllers\UserUmumController::class, 'renungan']);
Route::get('user-programklasis', [App\Http\Controllers\UserUmumController::class, 'program_klasis']);
Route::get('user-programwilayah', [App\Http\Controllers\UserUmumController::class, 'program_wilayah']);
Route::get('user-programpusat', [App\Http\Controllers\UserUmumController::class, 'program_pusat']);
Route::get('user-iuranwajib', [App\Http\Controllers\UserUmumController::class, 'iuran']);
Route::get('user-kegiatan', [App\Http\Controllers\UserUmumController::class, 'kegiatan']);
// Route::get('/users', 'App\Http\Controllers\UserUmumController@index');
Route::get('user-danalain', 'App\Http\Controllers\UserUmumController@danalain');
Route::get('user-organisasi', 'App\Http\Controllers\UserUmumController@organisasi');
Route::get('user-foto', 'App\Http\Controllers\UserUmumController@foto');
Route::get('user-video', 'App\Http\Controllers\UserUmumController@video');
Route::get('temi', 'App\Http\Controllers\UserUmumController@template_user');
  
});

// URL Ketua pusat
Route::group(['middleware' => ['auth']],function(){
        Route::group(['middleware' => ['ceklogin:1']],function(){
            Route::resource('pusats', Program_PusatController::class);
            Route::get('/pusat', 'App\Http\Controllers\PusatController@template');
            Route::get('/ketua-pusat', 'App\Http\Controllers\PusatController@index');
            Route::get('/ketua-pusat/create', 'App\Http\Controllers\PusatController@create'); //route untuk ke halaman tambah data
            Route::post('/ketua-pusat/store', 'App\Http\Controllers\PusatController@store'); //route untuk menyimpan data ke database
            Route::get('ketua-pusat/edit/{id}', 'App\Http\Controllers\PusatController@edit'); //route untuk ke halaman edit data
            Route::post('ketua-pusat/update/{id}', 'App\Http\Controllers\PusatController@update'); //route untuk mengupdate data ke database
            // UrL Tampilan User 
            Route::get('datwilayah', 'App\Http\Controllers\PusatController@wilayah');
            Route::get('datklasis', 'App\Http\Controllers\PusatController@klasis');
            Route::get('datpemuda', 'App\Http\Controllers\PusatController@pemuda');
            Route::get('datanggota', 'App\Http\Controllers\PusatController@anggota');
            Route::get('data-visimisi', 'App\Http\Controllers\PusatController@visimisi');
            Route::get('data-organisasi', 'App\Http\Controllers\PusatController@struktur');
            Route::get('data-sejarah', 'App\Http\Controllers\PusatController@sejarah');
            Route::get('data-danalain', 'App\Http\Controllers\PusatController@danalain');
            Route::get('data-wprogram', 'App\Http\Controllers\PusatController@wprogram');
            Route::get('data-kprogram', 'App\Http\Controllers\PusatController@kprogram');
            Route::get('data-kegiatan', 'App\Http\Controllers\PusatController@kegiatan');
            Route::get('data-galeri', 'App\Http\Controllers\PusatController@galeri');
            Route::get('data-renungan', 'App\Http\Controllers\PusatController@renungan');
            Route::get('data-video', 'App\Http\Controllers\PusatController@video');
            Route::get('dataiuran', 'App\Http\Controllers\PusatController@form_iuran');
            Route::post('dataiuran/store_iuran', 'App\Http\Controllers\PusatController@store_iuran');
            Route::get('datapassword', 'App\Http\Controllers\PusatController@edit_password');
            Route::put('datapassword/update_password', 'App\Http\Controllers\PusatController@update_password');
            Route::get('datapengumuman/show_pengumuman/{id}', 'App\Http\Controllers\PusatController@show_pengumuman');    
              
            
        });
        
//URL ketua wilayah
Route::group(['middleware' => ['ceklogin:2']],function(){
            //  Route::resource('wilayah', WilayahController:: class);
            Route::resource('wilayahs', Program_WilayahController::class);
              Route::get('/wilayah', 'App\Http\Controllers\WilayahController@template');
              Route::get('/dwilayah', 'App\Http\Controllers\WilayahController@index');
              Route::get('/dwilayah/create', 'App\Http\Controllers\WilayahController@create'); //route untuk ke halaman tambah data
              Route::post('/dwilayah/store', 'App\Http\Controllers\WilayahController@store'); //route untuk menyimpan data ke database
              Route::get('dwilayah/edit/{id}', 'App\Http\Controllers\WilayahController@edit'); //route untuk ke halaman edit data
              Route::post('dwilayah/update/{id}', 'App\Http\Controllers\WilayahController@update'); //route untuk mengupdate data ke database
              Route::get('datapusat', 'App\Http\Controllers\TampilanUserController@pusat')->name('datapusat');
            //URL user tampilan
            Route::get('wpusat', 'App\Http\Controllers\WilayahController@pusat');
            Route::get('wklasis', 'App\Http\Controllers\WilayahController@klasis');
            Route::get('wpemuda', 'App\Http\Controllers\WilayahController@pemuda');
            Route::get('wanggota', 'App\Http\Controllers\WilayahController@anggota');
            Route::get('wvisimisi', 'App\Http\Controllers\WilayahController@visimisi');
            Route::get('worganisasi', 'App\Http\Controllers\WilayahController@organisasi');
            Route::get('wsejarah', 'App\Http\Controllers\WilayahController@sejarah');
            Route::get('wkegiatan', 'App\Http\Controllers\WilayahController@kegiatan');
            Route::get('wprogram-pusat', 'App\Http\Controllers\WilayahController@programpusat');;
            Route::get('wprogram-klasis', 'App\Http\Controllers\WilayahController@programklasis');
            Route::get('wrenungan', 'App\Http\Controllers\WilayahController@renungan');
            Route::get('wfoto', 'App\Http\Controllers\WilayahController@foto');
            Route::get('wvideo', 'App\Http\Controllers\WilayahController@video');
            Route::get('wiuran', 'App\Http\Controllers\WilayahController@form_iuran');
            Route::post('wiuran/store_iuran', 'App\Http\Controllers\WilayahController@store_iuran');
            Route::get('wpassword', 'App\Http\Controllers\WilayahController@edit_password')->name('user.wpassword.edit');
            Route::patch('wpassword/update_password', 'App\Http\Controllers\WilayahController@update_password')->name('user.wpassword.update');
            Route::get('wpengumuman/show/{id}', 'App\Http\Controllers\WilayahController@show');
            Route::get('wdanalain', 'App\Http\Controllers\WilayahController@danalain');
             
            });

        // URL Ketua Klasis
     Route::group(['middleware' => ['ceklogin:3']],function(){
     Route::resource('klasiss', Program_KlasisController::class);
     Route::get('/klasis', 'App\Http\Controllers\KlasisController@template');
     Route::get('/ketua-klasis', 'App\Http\Controllers\KlasisController@index');
     Route::get('/ketua-klasis/create', 'App\Http\Controllers\KlasisController@create'); //route untuk ke halaman tambah data
    Route::post('/ketua-klasis/store', 'App\Http\Controllers\KlasisController@store'); //route untuk menyimpan data ke database
    Route::get('ketua-klasis/edit/{id}', 'App\Http\Controllers\KlasisController@edit'); //route untuk ke halaman edit data
    Route::post('ketua-klasis/update/{id}', 'App\Http\Controllers\KlasisController@update'); //route untuk mengupdate data ke database
   // URL Tampilan
    Route::get('ketpusat', 'App\Http\Controllers\KlasisController@pusat');
    Route::get('ketwilayah', 'App\Http\Controllers\KlasisController@wilayah');
    Route::get('ketpemuda', 'App\Http\Controllers\KlasisController@pemuda');
    Route::get('ketanggota', 'App\Http\Controllers\KlasisController@anggota');
    Route::get('kvisimisi', 'App\Http\Controllers\KlasisController@visimisi');
    Route::get('korganisasi', 'App\Http\Controllers\KlasisController@organisasi');
    Route::get('ksejarah', 'App\Http\Controllers\KlasisController@sejarah');
    Route::get('kprogram-pusat', 'App\Http\Controllers\KlasisController@programpusat');
    Route::get('kprogram-wilayah', 'App\Http\Controllers\KlasisController@programwilayah');
    Route::get('kkegiatan', 'App\Http\Controllers\KlasisController@kegiatan');
    Route::get('kfoto', 'App\Http\Controllers\KlasisController@foto');
    Route::get('krenungan', 'App\Http\Controllers\KlasisController@renungan');
    Route::get('kvideo', 'App\Http\Controllers\KlasisController@video');
    Route::get('kiuran', 'App\Http\Controllers\KlasisController@form_iuran');
    Route::post('kiuran/store_iuran', 'App\Http\Controllers\KlasisController@store_iuran');
    Route::get('kpassword', 'App\Http\Controllers\KlasisController@edit_password')->name('user.kpassword.edit');
    Route::patch('kpassword/update_password', 'App\Http\Controllers\KlasisController@update_password')->name('user.kpassword.update');
    Route::get('kpengumuman/show/{id}', 'App\Http\Controllers\KlasisController@show');
    Route::get('kdanalain', 'App\Http\Controllers\KlasisController@danalain');
    
    
});

        // URL Ketua Pemuda
        Route::group(['middleware' => ['ceklogin:4']],function(){
        Route::get('/pemuda', 'App\Http\Controllers\KetuaPemudaController@template');
        Route::resource('ketua-pemuda', KetuaPemudaController::class);
      
        //URL User
        Route::get('ketpusats', 'App\Http\Controllers\KetuaPemudaController@pusat');
        Route::get('ketwilayahs', 'App\Http\Controllers\KetuaPemudaController@wilayah');
        Route::get('ketklasiss', 'App\Http\Controllers\KetuaPemudaController@klasis');
        Route::get('ketanggotas', 'App\Http\Controllers\KetuaPemudaController@anggota');
        Route::get('pvisimisi', 'App\Http\Controllers\KetuaPemudaController@visimisi');
        Route::get('porganisasi', 'App\Http\Controllers\KetuaPemudaController@organisasi');
        Route::get('psejarah', 'App\Http\Controllers\KetuaPemudaController@sejarah');
        Route::get('pprogram-pusat', 'App\Http\Controllers\KetuaPemudaController@programpusat');
        Route::get('pprogram-wilayah', 'App\Http\Controllers\KetuaPemudaController@programwilayah');
        Route::get('pprogram-klasis', 'App\Http\Controllers\KetuaPemudaController@programklasis');
        Route::get('pkegiatan', 'App\Http\Controllers\KetuaPemudaController@kegiatan');
        Route::get('prenungan', 'App\Http\Controllers\KetuaPemudaController@renungan');
        Route::get('pfoto', 'App\Http\Controllers\KetuaPemudaController@foto');
        Route::get('pvideo', 'App\Http\Controllers\KetuaPemudaController@video');
        Route::get('piuran', 'App\Http\Controllers\KetuaPemudaController@form_iuran');
        Route::post('piuran/store_iuran', 'App\Http\Controllers\KetuaPemudaController@store_iuran');
        Route::get('ppassword', 'App\Http\Controllers\KetuaPemudaController@edit_password')->name('user.ppassword.edit');
        Route::patch('ppassword/update_password', 'App\Http\Controllers\KetuaPemudaController@update_password')->name('user.ppassword.update');
        Route::get('ppengumuman/show/{id}', 'App\Http\Controllers\KetuaPemudaController@show');
        Route::get('pdanalain', 'App\Http\Controllers\KetuaPemudaController@danalain');
     
      });

        // URL Anggota Pemuda
        Route::group(['middleware' => ['ceklogin:5']],function(){
        Route::get('anggotapemuda', 'App\Http\Controllers\AnggotaController@template');
        Route::resource('anggota', AnggotaController::class);
          //  url tampilan
        Route::get('datapusat', 'App\Http\Controllers\AnggotaController@pusat');
        Route::get('datawilayah', 'App\Http\Controllers\AnggotaController@wilayah');
        Route::get('dataklasis', 'App\Http\Controllers\AnggotaController@klasis');
        Route::get('datapemuda', 'App\Http\Controllers\AnggotaController@pemuda');
        Route::get('avisimisi', 'App\Http\Controllers\AnggotaController@visimisi');
        Route::get('asejarah', 'App\Http\Controllers\AnggotaController@sejarah');
        Route::get('aorganisasi', 'App\Http\Controllers\AnggotaController@organisasi');
        Route::get('aprogram-pusat', 'App\Http\Controllers\AnggotaController@programpusat');
        Route::get('aprogram-wilayah', 'App\Http\Controllers\AnggotaController@programwilayah');
        Route::get('aprogram-klasis', 'App\Http\Controllers\AnggotaController@programklasis');
        Route::get('akegiatan', 'App\Http\Controllers\AnggotaController@kegiatan');
        Route::get('afoto', 'App\Http\Controllers\AnggotaController@foto');
        Route::get('arenungan', 'App\Http\Controllers\AnggotaController@renungan');
        Route::get('avideo', 'App\Http\Controllers\AnggotaController@video');
        Route::get('aiuran', 'App\Http\Controllers\AnggotaController@form_iuran');
        Route::post('aiuran/store_iuran', 'App\Http\Controllers\AnggotaController@store_iuran');
        Route::get('apassword', 'App\Http\Controllers\AnggotaController@edit_password')->name('user.apassword.edit');
        Route::patch('apassword/update_password', 'App\Http\Controllers\AnggotaController@update_password')->name('user.apassword.update');
        Route::get('apengumuman/show/{id}', 'App\Http\Controllers\AnggotaController@show');
        Route::get('adanalain', 'App\Http\Controllers\AnggotaController@danalain');
        //Route::get('apengumuman', 'App\Http\Controllers\AnggotaController@show');
         
        });

  //URL admin/sekertaris
          Route::group(['middleware' => ['ceklogin:6']],function(){
          Route::resource('sekertaris', AdminController:: class);
          Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create']);
          Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);
          Route::get('template', 'App\Http\Controllers\AdminController@template')->name('template');
       // Route::get('password', 'App\Http\Controllers\PasswordController@edit')->name('user.password.edit');
       // Route::patch('password', 'App\Http\Controllers\PasswordController@update')->name('user.password.update');
          Route::resource('all-data', AllDataController::class);
          Route::resource('informasi', InformasiController::class);
          Route::resource('kegiatan', KegiatanController::class);
          Route::resource('carousel', CarouselController::class);
          Route::resource('berita-duka', BeritaDukaController::class);
          Route::resource('renungan', RenunganController::class);
          Route::resource('visimisis', VisimisiController::class);
          Route::resource('sejarah', SejarahController::class);
          Route::resource('berita-terbaru', BeritaTerbaruController::class);
          Route::resource('profile', UploadProfileController::class);
          Route::resource('foto', DataFotoController::class);
          Route::resource('video', VideoController::class);
          Route::resource('ulang', DataUlangTahunController::class);
          Route::resource('organisasi', OrganisasiController::class);
          Route::resource('pengumuman', PengumumanController::class);
          Route::get('sprofile', 'App\Http\Controllers\UploadProfileController@index');
          Route::get('sprofile/create_ketua', 'App\Http\Controllers\UploadProfileController@create_ketua');
          Route::post('sprofile/store_ketua', 'App\Http\Controllers\UploadProfileController@store_ketua');
          Route::get('sprofile/edit_ketua/{id}', 'App\Http\Controllers\UploadProfileController@edit_ketua');
          Route::put('sprofile/update_ketua/{id}', 'App\Http\Controllers\UploadProfileController@update_ketua');

         
          
          //URL tampilan
        Route::get('spusat', 'App\Http\Controllers\AdminController@pusat')->name('spusat');
        Route::get('swilayah', 'App\Http\Controllers\AdminController@wilayah')->name('swilayah');
        Route::get('sklasis', 'App\Http\Controllers\AdminController@klasis')->name('sklasis');
        Route::get('spemuda', 'App\Http\Controllers\AdminController@pemuda')->name('spemuda');
        Route::get('sanggota', 'App\Http\Controllers\AdminController@anggota')->name('sanggota');
        Route::get('siuran', 'App\Http\Controllers\AdminController@iuran')->name('siuran');
        Route::get('sdanalain', 'App\Http\Controllers\AdminController@danalain')->name('sdanalain');
        Route::get('sprogram-pusat', 'App\Http\Controllers\AdminController@programpusat')->name('sprogram-pusat');
        Route::get('sprogram-wilayah', 'App\Http\Controllers\AdminController@programwilayah')->name('sprogram-wilayah');
        Route::get('sprogram-klasis', 'App\Http\Controllers\AdminController@programklasis')->name('sprogram-klasis');
        Route::DELETE('siuranb/destroy/{id}', 'App\Http\Controllers\AdminController@destroy');
        

       
        //Route::get('datapusat', 'App\Http\Controllers\TampilanUserController@pusat')->name('datapusat');

        });
          //URL Bendahara
 Route::group(['middleware' => ['ceklogin:7']],function(){
  Route::get('/bendahara', 'App\Http\Controllers\BendaharaController@template');
  Route::resource('iuran', IuranWajibController::class);
  Route::resource('bkeuangan', DanaLainController::class);
//  tampilan user
  Route::get('banggota', 'App\Http\Controllers\BendaharaController@anggota');
  Route::get('bpusat', 'App\Http\Controllers\BendaharaController@pusat');
  Route::get('bwilayah', 'App\Http\Controllers\BendaharaController@wilayah');
  Route::get('bklasis', 'App\Http\Controllers\BendaharaController@klasis');
  Route::get('bpemuda', 'App\Http\Controllers\BendaharaController@pemuda');
  Route::get('bvisimisi', 'App\Http\Controllers\BendaharaController@visimisi');
  Route::get('borganisasi', 'App\Http\Controllers\BendaharaController@organisasi');
  Route::get('bsejarah', 'App\Http\Controllers\BendaharaController@sejarah');
  Route::get('bprogram-pusat', 'App\Http\Controllers\BendaharaController@program_pusat');
  Route::get('bprogram-wilayah', 'App\Http\Controllers\BendaharaController@program_wilayah');
  Route::get('bprogram-klasis', 'App\Http\Controllers\BendaharaController@program_klasis');
  Route::get('bkegiatan', 'App\Http\Controllers\BendaharaController@kegiatan');
  Route::get('brenungan', 'App\Http\Controllers\BendaharaController@renungan');
  Route::get('bvideo', 'App\Http\Controllers\BendaharaController@video');
  Route::get('bfoto', 'App\Http\Controllers\BendaharaController@foto');
  Route::get('biuran', 'App\Http\Controllers\BendaharaController@iuran');
  Route::get('datapepe/show/{id}', 'App\Http\Controllers\BendaharaController@show');
  Route::get('bpassword', 'App\Http\Controllers\BendaharaController@edit_password')->name('user.bpassword.edit');
  Route::patch('bpassword/update_password', 'App\Http\Controllers\BendaharaController@update_password')->name('user.bpassword.update');
//Route::get('pusat', 'App\Http\Controllers\BendaharaController@pusat');

});

 //URL  Tampilan User
  Route::group(['middleware' => ['auth']],function(){
  ///password change
  Route::get('password', 'App\Http\Controllers\PasswordController@edit')->name('user.password.edit');
  Route::patch('password', 'App\Http\Controllers\PasswordController@update')->name('user.password.update');
  //Route::get('ketuapusat', [App\Http\Controllers\UserDataController::class, 'datapusat']);
  //Route::get('ketuawilayah', [App\Http\Controllers\UserDataController::class, 'datawilayah']);
  //Route::get('ketuaklasis', [App\Http\Controllers\UserDataController::class, 'dataklasis']);
  //Route::get('ketuapemuda', [App\Http\Controllers\UserDataController::class, 'datapemuda']);
  //Route::get('anggota-pemuda', [App\Http\Controllers\UserDataController::class, 'datanggota']);
  
});

//penutup semua use login

});




