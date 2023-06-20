@extends('Data-User.Pemuda.tampilan-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('pemuda') }}">Home</a> {{ __('/ Visi & Misis') }}</div>
      <hr>
 </div>
<div class="row">
    <h4 class="text-center" style="font-family:Arial Black" >Visi & Misi Pemuda (GIDI) </h4>
    <div class="cord shadow">
        @foreach ($visimisi as $row)
    <div class="col-4">

            <h4> <b> {{ $row->judul }}</b></h4>
            <p>{!! $row->isi !!}</p>
       
    </div>
    @endforeach
</div>
</div>
@endsection