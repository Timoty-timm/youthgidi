@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Foto') }}</div>
                    <hr>
                </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Data Foto</h4>
    <a class="btn btn-success" href="{{ route('foto.create') }}"> <i class="fa fa-plus"> Upload Foto</i> </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
<br>
        @forelse($foto as $key => $item)
        <div class="col-lg-4">
<br>
            <div class="card shadow">
              <a href="/image/{{ $item->image }}">
                <img src="/image/{{ $item->image }}" width="300px" height="200" >
              </a>
              <div class="card-body">
                {{-- <p class="btn btn-success rounded-pill btn-sm">{{ $product->judul }}</p> --}}
                <div class="card-title fw-bold text-primary h4"> <h4><b>{{ $item->judul }}</b></h4> </div>
                <p class="text-secondary">{!! $item->isi !!}</p><br>


                <form action="{{ route('foto.destroy', $item->id) }}" method="POST">
                    <a class="btn btn-warning" href="{{ route('foto.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>
                  @csrf
                  @method('DELETE')

                  {{-- <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button> --}}
              </form>

              </div>
            </div>
        </div>
        @endforeach
  
    @endsection