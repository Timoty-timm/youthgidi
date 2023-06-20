@extends('Data-User.Klasis.tampilan-user')
@section('content') 
<div class="card">
  <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Ketua Klasis') }}</div>
    <hr>
</div>
  <div class="container">
    <h4 class="text-center" style="font-family:Arial Black" >Data Ketua Klasis</h4>
      <a href="{{url('ketua-klasis/create')}}" class="btn btn-success btn-bg-3"> <i class="fa fa-plus">Tambah Data</i> </a>
<br><br>
    <div class="mb-3 col-lg-11">
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success">
   <p>{{ $message }}</p>
  </div>
 @endif
 </div>
 <div class="mb-3 col-lg-11">
 <div class="card" style="background:  rgb(220, 213, 226)" >
  <div class="card-header">
         <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5" >
          <tr style="background: rgb(23, 95, 204)">
             <th class="text-center" style="font-family: Arial, black">#</th>
             <th class="text-center" style="font-family: Arial, black" >NIK</th>
             <th class="text-center" style="font-family: Arial, black" >Nama</th>
             <th class="text-center" style="font-family: Arial, black" >Masa Jabatan</th>
             <th class="text-center" style="font-family: Arial, black" >Alamat</th>
             <th class="text-center" style="font-family: Arial, black" >Akasi</th>

          </tr>
         @foreach ($klasis as $item)
         <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->masajabatan}}</td>
            <td>{{$item->alamat}}</td>
            <td class="text-center">
                <a href="{{url('ketua-klasis/edit', $item->id)}}" class="btn btn-warning" > <i class="fa fa-edit"> Ubah</i></a>
            </td>
         </tr>
        @endforeach
  </table>
</div>
</div>
</div>
  </div>
@endsection