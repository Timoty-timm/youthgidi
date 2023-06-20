@extends('Data-User.Wilayah.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Visi & Misi') }}</div>
    <hr>
</div>
<div class="row">
    <h4 class="text-center" style="font-family:Arial Black" >Data Visi Misi Pemuda GIDI</h4>
    <div class="cord shadow">
        @foreach ($visimisi as $row)
    <div class="col-4">

            <h3>{{ $row->judul }}</h3>
            <p>{!! $row->isi !!}</p>
       
    </div>
    @endforeach
</div>
</div>
@endsection