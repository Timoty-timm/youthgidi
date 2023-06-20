@extends('Data-User.Pusat.template-user')
@section('content')

<div class="card">
    <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Keuangan') }}</div>
    <hr>
  </div>
<h4 class="text-center" style="font-family:Arial Black" >Form Data Iuran Wajib</h4>
<div class="col-lg-10 margin-tb">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
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
<form action="{{ url('dataiuran/store_iuran') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
     
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black">Wilayah:</strong>
                <select id="" name="wilayah" class="form-control" >
                    <option style="font-family: Arial, black" value="wilayah">Pilih..</option>
                    <option style="font-family: Arial, black" value="Toli">Toli</option>
                    <option style="font-family: Arial, black" value="Bogo">Bogo</option>
                    <option style="font-family: Arial, black" value="Yamo">Yamo</option>
                    <option style="font-family: Arial, black" value="Yahukimo">Yahukimo</option>
                    <option style="font-family: Arial, black" value="Pengunungan Bintang">Pengunungan Bintang</option>
                    <option style="font-family: Arial, black" value="Pantai Selatan">Pantai Selatan</option>
                    <option style="font-family: Arial, black" value="Pantai Utara">Pantai Utara</option>
                    <option style="font-family: Arial, black" value="Jasumbas">Jasumbas</option>
                </select>
                {{-- <input type="text" name="wilayah" class="form-control" placeholder="Wilayah"> --}}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black">Nominal:</strong>
                <input type="text" name="nominal" class="form-control" placeholder="Nominal">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family: Arial, black"> Upload Bukti Transaksi:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
                <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
          
        </div>
    </div>

</form>
@endsection
