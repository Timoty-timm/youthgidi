@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Sejarah') }}</div>
      <hr>
 </div>
<section class="content">
    <h4 class="text-center" style="font-family:Arial Black" >Sejarah Pemuda GIDI</h4>
    <div class="card shadow col-lg-11">
          @foreach ($sejarah as $sejaras)
          <div class="row ">
              <div class="col">
               <h4 > <b>{{$sejaras->judul}}</b></h4>
                  <p>{!! $sejaras->isi!!}</p>
              </div>
          </div>
          @endforeach
      </div>
  </section>
  @endsection