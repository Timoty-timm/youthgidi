<?php

namespace App\Http\Controllers;

use App\Models\IuranWajib;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $counts = IuranWajib::count();
        $video=  Video::all();
        return view('Data-Admin.Galeri.Video.index',compact('video', 'counts'));
    }
    public function tampilvideo(){
        $uservideo = Video::all();
        return view('users/video.index', compact('uservideo'));
    }
    public function create(){
        $counts = IuranWajib::count();
        return view('Data-Admin.Galeri.Video.create', compact('counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            //'video' => 'required|mimetypes:video/mp4,video/avi|max:50000', // Atur validasi sesuai kebutuhan Anda
            'judul' => 'required',
            'desk' => 'required',
            'path' => 'required|mimetypes:video/mp4,video/avi'
        ]);
        $videoName = time().'.'.$request->file('path')->getClientOriginalExtension();
        $request->file('path')->move(public_path('videos'), $videoName);
        $video = new Video();
        $video->judul = $request->input('judul');
        $video->desk = $request->input('desk');
        $video->path = 'videos/'.$videoName;
        $video->save();
    
        return redirect()->route('video.index')->with('success', 'Video uploaded successfully.');
    }
    
    public function edit($id){
        $counts = IuranWajib::count();
        $video = Video::findOrFail($id);
        return view('Data-Admin.Galeri.Video.edit', compact('video', 'counts'));
    }

    public function update(Request $request, $id){
      // Validasi input jika diperlukan
      $request->validate([
        'judul' => 'required',
        'desk' => 'required',
        'path' => 'mimes:mp4|max:9048' // Contoh validasi untuk tipe file mp4 dan ukuran maksimum 2MB
    ]);

    // Temukan video yang akan diperbarui
    $video = Video::findOrFail($id);

    // Update judul video
    $video->judul = $request->input('judul');
    $video->desk = $request->input('desk');
    // Periksa apakah ada file video yang diunggah
    if ($request->hasFile('video')) {
        $uploadedFile = $request->file('video');
        $filename = time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('videos'), $filename);
        // Update nama file video
        $video->filename = $filename;
    }
    // Simpan perubahan video
    $video->save();
    // Redirect ke halaman yang sesuai atau berikan respons JSON jika lebih cocok
    return redirect('video')->with('success', 'Video berhasil diubah');

    }



    public function destroy(Video $video)
    {
        $video->delete();
     
        return redirect()->route('video.index') ->with('success','Video deleted successfully');
    }
}
