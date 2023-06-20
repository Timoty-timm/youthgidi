@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Ulang Tahun') }}</div>
                    <hr>
                </div>
        </div>
    </div>
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Ucpakan Ulang Tahun</h4>
 <div class="col-lg-10">
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
 </div>
  
   
    <form action="{{ route('ulang.update',$ulang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Nama:</strong>
                    <input type="text" required name="nama" value="{{ $ulang->nama}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Upload Foto:</strong>
                    <input type="file"  name="image" value="{{ $ulang->image }}" class="form-control" placeholder="image">
                    <img src="/image/{{ $ulang->image }}" width="200px">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 ">
              <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
            </div>
        </div>

    </form>
@endsection
