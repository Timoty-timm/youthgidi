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
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Profile Ketua Pemuda GIDI</h4>
    <form action="{{ route('profile.update',$profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Nama:</strong>
                    <input type="text" name="nama" value="{{ $profil->nama}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Foto:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $profil->image }}" width="200px">
                </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11 ">
              <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
            </div>
        </div>

    </form>
@endsection