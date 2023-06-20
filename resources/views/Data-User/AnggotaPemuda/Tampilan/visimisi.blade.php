@extends('Data-User.AnggotaPemuda.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('anggotapemuda') }}">Home</a> {{ __('/ Visi & Misi') }}</div>
      <hr>
 </div>
<div class="row">
    <h4 class="text-center" style="font-family:Arial Black" >Visi & Misi Pemuda GIDI</h4>
    <div class="cord shadow col-lg-11">
        @foreach ($visimisi as $row)
    <div class="col-4">

            <h4> <b>{{ $row->judul }}</b></h4>
            <p>{!! $row->isi !!}</p>
       
    </div>
    @endforeach
</div>
</div>
@endsection