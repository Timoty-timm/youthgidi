

@extends('Data-User.AnggotaPemuda.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('anggotapemuda') }}">Home</a> {{ __('/ Anggota Pemuda') }}</div>
      <hr>
 </div><br>
<h4 class="text-center" style="font-family:Arial Black" >Data Anggota Pemuda</h4>
<div class="col-lg-10 margin-tb">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Data Anda Kosong, Lengkapi Semua!<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >NIK (KTP):</strong>
                <input type="text" name="nik" class="form-control" placeholder="NIK">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Jenis Kelamin:</strong>
                <select name="jk" id="jk" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Wilayah:</strong>
                <select name="wilayah" class="form-control" placeholder="Wilayah">
                    <option style="font-family:Arial, black"  value="wilayah">Pilih...</option>
                    <option style="font-family:Arial, black"  value="Bogo">Bogo</option>
                   <option style="font-family:Arial, black"  value="Toli">Toli</option>
                   <option style="font-family:Arial, black"  value="Yamo">Yamo</option>
                   <option style="font-family:Arial, black"  value="Yahukimo">Yahukimo</option>
                   <option style="font-family:Arial, black"  value="Pegunungan Bintang">Pegunungan Bintang</option>
                   <option style="font-family:Arial, black"  value="Pantai Selatan">Pantai Selatan</option>
                   <option style="font-family:Arial, black"  value="Pantai Utara">Pantai Utara</option>
                   <option style="font-family:Arial, black"  value="Jasumbas">Jasumbas</option>
                </select>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Klasis:</strong>
                <select name="klasis" class="form-control" placeholder="Wilayah">
                    <option style="font-family:Arial, black"  value="klasis">Pilih...</option>
                    <option style="font-family:Arial, black"  value="Goyage">Goyage</option>
                   <option style="font-family:Arial, black"  value="Geya">Geya</option>
                   <option style="font-family:Arial, black"  value="Kubu">Kubu</option>
                   <option style="font-family:Arial, black"  value="Konda">Konda</option>
                   <option style="font-family:Arial, black"  value="Wunin">Wunin</option>
                   <option style="font-family:Arial, black"  value="Toma">Toma</option>
                   <option style="font-family:Arial, black"  value="Awon">Awon</option>
                   <option style="font-family:Arial, black"  value="Kangi">Kangi</option>
                </select>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Tanggal Lahir:</strong>
                <input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong style="font-family:Arial, black" >Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
                <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
          
        </div>
    </div>

</form>
@endsection
