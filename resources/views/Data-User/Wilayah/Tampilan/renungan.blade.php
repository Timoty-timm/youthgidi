@extends('Data-User.Wilayah.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Renungan') }}</div>
  <hr>
</div><br>
<section class="container">
    <h4 class="text-center" style="font-family:Arial Black" >Data Renungan </h4>
    <br>
    <div class="row">
      <div class="col-lg-11" >
      @forelse($renungan as $key => $product)
      <div class="col-lg-4 " >
         <br>
          <div class="card shadow " style="background: rgb(240, 238, 241)" >
           
            <div class="card-body ">
             
              <div class="card-title fw-bold text-primary text-center " > <h4>{{ $product->judul }}</h4></div>
              <p class="text-secondary">{!!$product->isi!!}</p><br>
              <p>Tanggal: {{ $product->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</p>
               <hr>
            </div>
          </div>
      </div>
      @endforeach
    </div>
    </div>
  </section>

@endsection