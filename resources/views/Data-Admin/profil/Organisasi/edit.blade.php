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
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Struktur Organisasi</h4>
    <form action="{{ route('organisasi.update',$organisasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Upload Foto:</strong>
                    <input type="file" name="image"  placeholder="image">
                    <img src="/image/{{ $organisasi->image }}" width="900px" height="400px" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <button type="submit" class="btn btn-success"> <h4><b> Simpan</b></h4></button>
            </div>
        </div>

    </form>
@endsection