@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Kegiatan') }}</div>
  <hr>
</div>
<div class="card">
    <h4 class="text-center" style="font-family:Arial Black" >Data Kegiatan</h4>
</div>
<br><br>
<div class="row">
    @forelse($kegiatan as $key => $product)
    <div class="col-lg-4">
       <br>
        <div class="card shadow">
          <a href="/image/{{ $product->image }}">
            <img src="/image/{{ $product->image }}" width="341px" height="200" >
          </a>
          <div class="card-body">
           
            <div class="card-title fw-bold text-primary h4"> <h4> {{ $product->judul }}</h4></div>
            <p class="text-secondary">{!! $product->isi !!}</p><br>
             
          </div>
        </div>
    </div>
    @endforeach
  </div>
  @endsection