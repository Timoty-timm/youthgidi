@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Struktur Organisasi') }}</div>
                    <hr>
                </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Struktur Organisasi</h4>
    {{-- <a class="btn btn-success" href="{{ route('organisasi.create') }}"> <i class="fa fa-plus"> Upload Image</i> </a> --}}
    &nbsp;&nbsp;&nbsp;&nbsp;
<br>
        @forelse($organisasi as $key => $item)
        <br>
        <a class="btn btn-warning" href="{{ route('organisasi.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>

        <center>
        <div class="col-lg-4 text-center">
          <br>
            <div class="card shadow text-center">
              <a href="/image/{{ $item->image }}">
                <img src="/image/{{ $item->image }}" width="900px" height="400" >
              </a>
              <div class="card-body">
                   
              </div>
            </div>
        </div>
    </center>
        @endforeach
  
    @endsection