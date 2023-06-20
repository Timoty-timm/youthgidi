@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Visi & Misi') }}</div>
    <hr>
</div>
<div class="row">
    <div class="cord shadow">
        @foreach ($visimisi as $row)
    <div class="col-4">

            <h1>{{ $row->judul }}</h1>
            <p>{!! $row->isi !!}</p>
       
    </div>
    @endforeach
</div>
</div>
@endsection