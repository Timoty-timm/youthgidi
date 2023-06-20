

@extends('Data-User.Pemuda.tampilan-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('pemuda') }}">Home</a> {{ __('/ Ketua Pemuda') }}</div>
      <hr>
 </div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
         
        </div>
        
    </div>
</div>
<h4 class="text-center" style="font-family:Arial Black" >Data Ketua Pemuda</h4>
<div class="col-lg-10 margin-tb">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<form action="{{ route('ketua-pemuda.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black" >NIK:</strong>
                <input type="text" name="nik" class="form-control" placeholder="Nik">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black" >Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black" >Masa Jabatan:</strong>
                <input type="text" name="masajabatan" class="form-control" placeholder="Masa Jabatan">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black" >Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
                <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
          
        </div>
    </div>

</form>
@endsection
