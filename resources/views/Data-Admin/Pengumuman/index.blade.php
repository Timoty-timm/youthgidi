@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="card mt-5">
        <div class="card">
            <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Pengumuman') }}</div>
                <hr>
            </div>
        <div class="card-body">
          <h4 class="text-center" style="font-family:Arial Black" >Pengumuman</h4>
            <div class="row">

                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('pengumuman.create') }}"> <i class="fa fa-plus">Tambah Data</i></a>
                    </div>
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
               
                
                @foreach($pengumuman as $key => $item)
                <div class="col-lg-6">
                   <br>
                    <div class="card shadow">
                   
                      <div class="card-body">
                        <div class="card-title fw-bold"> <h4><b> {{ $item->judul }}</b></h4></div>
                        <p class="text-secondary">{!! $item->isi !!}</p><br>
        
        
                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('pengumuman.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i></a>
                            {{-- <a class="btn btn-primary" href="{{ route('pengumuman.show', $item->id) }}"> <i class="fa fa-edit"> Show</i></a> --}}
                            @csrf
                          @method('DELETE')
        
                          {{-- <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button> --}}
                      </form>
        
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection