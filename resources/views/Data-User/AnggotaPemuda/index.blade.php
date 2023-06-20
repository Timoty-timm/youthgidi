
@extends('Data-User.AnggotaPemuda.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('anggotapemuda') }}">Home</a> {{ __('/ Anggota Pemuda') }}</div>
    <hr>
</div>
<div class="container">
   <h4 class="text-center" style="font-family:Arial Black" >Data Anggota Pemuda</h4>
   <div class="col-lg-11">
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
     </div>
    @endif
   </div>
    <a href="{{url('anggota/create')}}" class="btn btn-success"> <i class="fa fa-plus">Tambah Data</i> </a>
    <br>
    <div class="card">
        <div class="row">
            <div class="col-lg-11">
              <div class="mb-3 col-lg-12">
               
                <div class="small-box bg-info">
         
            </div>
        <table  class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
          <tr style="background:  rgb(23, 95, 204)"  >
             <th class="text-center" style="font-family: Arial Black">#</th>
             <th class="text-center" style="font-family: Arial Black">NIK</th>
             <th class="text-center" style="font-family: Arial Black">Nama</th>
             <th class="text-center" style="font-family: Arial Black">Jenis-Kelaman</th>
             <th class="text-center" style="font-family: Arial Black">Wilayah</th>
             <th class="text-center" style="font-family: Arial Black">Klasis</th>
             <th class="text-center" style="font-family: Arial Black">Tanggal Lahir</th>
             <th class="text-center" style="font-family: Arial Black">Alamat</th>
             <th class="text-center" style="font-family: Arial Black">Aksi</th>
          </tr>
        @foreach ($post as $item)
          <tr>
             <td class="text-center" >{{ ++$i }}</td>
             <td >{{$item->nik}}</td>
             <td >{{$item->nama}}</td>
             <td >{{$item->jk}}</td>
             <td >{{$item->wilayah}}</td>
             <td >{{$item->klasis}}</td>
             <td >{{$item->created_at->format('Y-m-d')}}</td>
             <td >{{$item->alamat}}</td>
             <td  class="text-center" >
                <a href="{{route('anggota.edit', $item->id)}}" class="text-center btn btn-warning btn"> <i class="fa fa-edit"> Ubah</i></a>
            </td>
          </tr>
         @endforeach
         
   </table>
   Total: {{ $count }}
   {{ $post->links() }}
        </div>
</div>
</div>
</div>
</div>
@endsection
