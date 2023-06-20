@extends('Data-User.Klasis.tampilan-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Ketua Klasis') }}</div>
      <hr>
</div>
<div class="container">
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Data Ketua Klasis</h4>
<div class="col-lg-10">
   <!-- validasi errors -->

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
@endforeach
</ul>
 </div>
@endif
<div class="mb-3 col-lg-12">
@if ($message = Session::get('sukses'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
 </div>
@endif
</div> 
</div>
<div class="col-lg-10">
       <div class="card">
       <div class="card-header">
       </div>
      
       <div class="card-body">
           <form action="{{url('ketua-klasis/update', $klasis->id)}}" method="post">
               @csrf
               <div class="mb-3">
                   <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">NIK</label>
                   <input type="text" value="{{$klasis->nik}}" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>
               <div class="mb-3">
                   <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Nama</label>
                   <input type="text" value="{{$klasis->nama}}" name="nama" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>

               <div class="mb-3">
                   <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Masa Jabatan</label>
                   <input type="text" value="{{$klasis->masajabatan}}" name="masajabatan" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>
               <div class="mb-3">
                   <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Alamat</label>
                   <input type="text" value="{{$klasis->alamat}}" name="alamat" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
               </div><br>
               <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
           </form>
       </div>
   </div>
  </div>
</div>
  @endsection