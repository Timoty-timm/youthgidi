<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\IuranWajib;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
class CarouselController extends Controller
{
   
    public function index()
    {
        $counts = IuranWajib::count();
            $carousel = Carousel::all();

            return view('Data-Admin.Corousel.index',compact('carousel', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counts = IuranWajib::count();
        return view('Data-Admin.Corousel.create', compact('counts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'isi'=>'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Carousel::create($input);

        return redirect()->route('carousel.index')
                        ->with('success','Foto berhasil diupload!');
    }

  
    public function edit($id)
    {
        $counts = IuranWajib::count();
        $carousel = Carousel::find($id);
        return view('Data-Admin.Corousel.edit',compact('carousel', 'counts'));
    }

   
    public function update(Request $request, $id)
    {
        $update = [
            'title' => $request->title,
            'isi' => $request->isi,
        ];
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }else{
            unset($update['image']);
        }
        Carousel::where('id', $id)->update($update);
        return redirect()->route('carousel.index')
                        ->with('success','Foto berhasil diubah!');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
    return redirect()->route('carousel.index')
                    ->with('success','Foto  berhasil dihapus');
    }
}
