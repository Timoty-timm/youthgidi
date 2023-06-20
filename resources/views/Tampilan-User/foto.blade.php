@extends('Tampilan-User.template-user')
@section('content')
<div class="col-lg-12">
  <br>
  <h3 class="text-center " style="font-family:Arial Black"  >Foto</h3>
</div>
<div class="row">
    @forelse($galeri as $key => $product)
    <div class="col-lg-4">
       <br>
        <div class="card shadow">
          <a href="/image/{{ $product->image }}">
            <img src="/image/{{ $product->image }}" width="341px" height="200" >
          </a>
          <div class="card-body">
           
            <div class="card-title fw-bold text-primary h4">{{ $product->judul }}</div>
            <p class="text-secondary">{!! $product->isi!!}</p><br>
           <b style="font-family: initial">Tanggal: {{ $product->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b> 
             <hr>
          </div>
        </div>
    </div>
    @endforeach
  </div>
  @endsection