@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Struktur Organisasi') }}</div>
                <hr>
            </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>Ada beberapa masalah dengan masukan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <h3 class="text-center" style="font-family:Arial Black" >Form Struktur Organisasi</h3>

<form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="font-family: Arial black">Foto:</strong>
                <input type="file" name="image" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-success"> <h4><b> Simpan</b></h4></button>
        </div>
    </div>
</form>

@endsection