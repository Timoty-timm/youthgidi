@extends('Tampilan-User.template-user')
@section('content')
<div class="row text-center" >
    <h4 class="text-center" style="font-family:Arial Black" ><b>Data Struktur Organisasi Pemuda GIDI</b> </h4>
    <br><br>
      @forelse($organisasi as $key => $product)
         <br>
          <div class="card shadow">
            <a href="/image/{{ $product->image  }}">
            <img src="/image/{{ $product->image }}" width="900px" height="340" >
            </a>
            <div class="card-body">
             
              <div class="card-title fw-bold text-primary h4">  {{ $product->judul }}</div>
              <p class="text-secondary">{{$product->isi}}</p><br>
               
            </div>
          </div>
     
      @endforeach
</div>
@endsection