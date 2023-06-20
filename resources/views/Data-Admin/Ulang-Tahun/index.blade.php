@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Ulang Tahun') }}</div>
                    <hr>
                </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Ucapkan Ulang Tahun</h4>
    <a class="btn btn-success" href="{{ route('ulang.create') }}"> <i class="fa fa-plus"> Tambah Data</i> </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
<br>
        @forelse($ulang as $key => $item)
        <div class="col-lg-4">
<br>
            <div class="card shadow">
              <a href="/image/{{ $item->image}}">
                <img src="/image/{{ $item->image }}" width="300px" height="200" >
              </a>
              <div class="card-body">
                <div class="card-title fw-bold text-primary h4"> <h4>{{ $item->nama}}</h4>  </div>
                    <a class="btn btn-warning" href="{{ route('ulang.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>

              </div>
            </div>
        </div>
        @endforeach
  
    @endsection