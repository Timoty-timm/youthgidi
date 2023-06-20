@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Upload Profile') }}</div>
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
  <h4 class="text-center" style="font-family:Arial Black" >Form  Profile Sekertaris Pemuda GIDI</h4>

<form action="{{ url('sprofile/store_ketua') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial black" >Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial black" >Uplaod Foto:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11 ">
                <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
        </div>
    </div>
</form>

@endsection