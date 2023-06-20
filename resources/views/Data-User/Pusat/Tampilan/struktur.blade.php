@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Struktur Organisasi') }}</div>
  <hr>
</div>
<div class="row text-center" >
  
    @forelse($struktur as $key => $product)

       <br>
        <div class="card shadow">
          <a href="/berita-duka/{{ $product->id }}">
          <img src="/image/{{ $product->image }}" width="900px" height="340" >
          </a>
          <div class="card-body">
           
            <div class="card-title fw-bold text-primary h4">{{ $product->judul }}</div>
            <p class="text-secondary">{{$product->isi}}</p><br>
             
          </div>
        </div>
   
    @endforeach

</div>
@endsection