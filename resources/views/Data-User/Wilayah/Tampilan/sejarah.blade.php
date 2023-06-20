@extends('Data-User.Wilayah.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Sejarah') }}</div>
    <hr>
</div>
<section class="content">
    <h4 class="text-center" style="font-family:Arial Black" >Data Sejarah Pemuda GIDI</h4>
    <div class="card shadow">
          @foreach ($sejarah as $sejaras)
          <div class="row ">
              <div class="col">
               <center><h4 >{{$sejaras->judul}}</h4></center>   
                  <p>{!! $sejaras->isi!!}</p>
              </div>
          </div>
          @endforeach
      </div>
  </section>
  @endsection