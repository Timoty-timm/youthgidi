
@extends('Data-User.Pemuda.tampilan-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('pemuda') }}">Home</a> {{ __('/ Ketua Pemuda') }}</div>
    <hr>
</div>
<div class="container">
   <h4 class="text-center" style="font-family:Arial Black" >Data Ketua Pemuda</h4>
   <div class="mb-3 col-lg-11">
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
     </div>
    @endif
    </div>
    <a href="{{route('ketua-pemuda.create')}}" class="btn btn-success"> <i class="fa fa-plus">Tambah Data</i> </a>
    <br>
    <br>
    <div class="card">
        <div class="row">
            <div class="col-lg-11">
              
        <div class="small-box bg-info" style="background:  rgb(220, 213, 226)" >
        <table  class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
          <tr style="background:rgb(23, 95, 204)">
             <th class="text-center">#</th>
             <th class="text-center">NIK</th>
             <th class="text-center">Nama</th>
             <th class="text-center">Masa Jabatan</th>
             <th class="text-center">Alamat</th>
             <th class="text-center">Aksi</th>
          </tr>
        @foreach ($post as $item)
          <tr>
             <td class="text-center" >{{ ++$i }}</td>
             <td>{{$item->nik}}</td>
             <td>{{$item->nama}}</td>
             <td>{{$item->masajabatan}}</td>
             <td>{{$item->alamat}}</td>
             <td class="text-center" >
              <a href="{{route('ketua-pemuda.edit', $item->id)}}" class="text-center btn btn-warning btn"> <i class="fa fa-edit"> Ubah</i></a>
            </td>
          </tr>
         @endforeach
   </table>
        </div>
</div>
</div>
</div>
</div>
@endsection
