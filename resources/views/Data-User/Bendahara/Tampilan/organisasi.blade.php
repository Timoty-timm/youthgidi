@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Struktur Organisasi') }}</div>
    <hr>
</div>
<div class="row text-center" >
  <h4 class="text-center" style="font-family:Arial Black" >Data Struktur Organisasi Pemuda GIDI</h4>
    @forelse($organisasi as $key => $product)
       <br>
        <div class="card shadow">
          <a href="/image/{{ $product->image }}">
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