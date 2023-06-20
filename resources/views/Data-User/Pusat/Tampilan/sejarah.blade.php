@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Sejarah') }}</div>
    <hr>
</div>
<section class="content">
   
    <div class="card shadow">
          @foreach ($sejarah as $sejaras)
          <div class="row ">
              <div class="col">
               <center><h1 >{{$sejaras->judul}}</h1></center>   
                  <p>{!! $sejaras->isi!!}</p>
              </div>
          </div>
          @endforeach
      </div>
  </section>
  @endsection