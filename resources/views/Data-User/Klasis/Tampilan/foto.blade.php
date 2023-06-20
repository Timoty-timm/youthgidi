@extends('Data-User.Klasis.tampilan-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Foto') }}</div>
    <hr>
</div>
<div class="card">
    <h4 class="text-center" style="font-family:Arial Black" >Foto</h4>
</div>
<br><br>
<div class="row">
    @forelse($galeri as $key => $product)
    <div class="col-lg-6">
       <br>
        <div class="card shadow">
          <a href="/image/{{ $product->image }}">
            <img src="/image/{{ $product->image }}" width="341px" height="200 " >
          </a>
          <div class="card-body">
           
            <div class="card-title fw-bold text-primary h4">{{ $product->judul }}</div>
            <p class="text-secondary">{!! $product->isi!!}</p><br>
             
          </div>
        </div>
    </div>
    @endforeach
  </div>
  @endsection