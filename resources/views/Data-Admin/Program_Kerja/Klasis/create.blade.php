
@extends('Data-User.Klasis.tampilan-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Program Klasis') }}</div>
      <hr>
</div>
<div class="row">
    <div>
      <h4 class="text-center" style="font-family:Arial Black">Form Program Kerja Ketua Klasis</h4>
    </div>
    
</div>
<div class="col-lg-10 margin-tb">
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

<form action="{{ route('klasiss.store') }}" method="POST">
@csrf

 <div class="row">
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong style="font-family: Arial, black" >Program:</strong>
            <input type="text"  name="program" class="form-control" >
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong style="font-family: Arial, black" >Tujuan Program:</strong>
            <input type="text"  name="tujuan" class="form-control" >
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong style="font-family: Arial, black" >Waktu:</strong>
            <input type="date"  name="waktu" class="form-control" >
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong style="font-family: Arial, black" >Sasaran:</strong>
            <input type="text"  class="form-control" name="sasaran" >
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
    </div>
</div>
</form>
@endsection