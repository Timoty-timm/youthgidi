@extends('Data-User.Wilayah.template-user')
@section('content')    
    {{-- Halaman Content --}}
    {{-- Halaman Content --}}
    <div class="card">
      <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Ketua Pusat') }}</div>
      <hr>
  </div>
    <div class="container">
      <div class="row mt-5">
       
     <h4 class="text-center" style="font-family:Arial Black" >Data Ketua Pusat</h4>
      <br>
      
       @if ($message = Session::get('sukses'))
       <div class="alert alert-success">
         <p>{{ $message }}</p>
        </div>
       @endif

       <div class="col-lg-11 margin-tb"">
      <div class="card shadow " style="background: rgb(220, 213, 226)" >
     
              <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="10" >
               <tr style="background: rgb(23, 95, 204)" >
                  <th class="text-center" style="font-family: Arial black">#</th>
                  <th class="text-center" style="font-family: Arial black" >NIK</th>
                  <th class="text-center" style="font-family: Arial black" >Nama</th>
                  <th class="text-center" style="font-family: Arial black" >Masa Jabatan</th>
                  <th class="text-center" style="font-family: Arial black" >Alamat</th>
               </tr>
               @foreach ($post as $item)
               <tr>
                  <td class="text-center">{{ ++$i }}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->masajabatan}}</td>
                  <td>{{$item->alamat}}</td>
               </tr>
              @endforeach
        </table>
     </div>
    </div>
  </div>
  </div>
    @endsection