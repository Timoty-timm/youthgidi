@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Visi & Misi') }}</div>
        <hr>
    </div>
    <div class="card mt-5">
        <div class="card-body">
          <h4 class="text-center" style="font-family:Arial Black" > Data Visi & Misi</h4>
            <div class="row">

                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('visimisis.create') }}" style="font-family: Arial Black"> <i class="fa fa-plus"  >  Tambah Data</i></a>
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
               
               
                    @foreach($visimisi as $key => $item)
                    <div class="col-lg-6">
                       <br>
                        <div class="card shadow">
                       
                          <div class="card-body">
                            <div class="card-title fw-bold"> <h4><b> {{ $item->judul }}</b></h4></div>
                            <p class="text-secondary">{!! $item->isi !!}</p><br>
            
            
                            <form action="{{ route('visimisis.destroy', $item->id) }}" method="POST">
                               <p style="margin-left: 80%"> <a class="btn btn-warning" href="{{ route('visimisis.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i></a></p>
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