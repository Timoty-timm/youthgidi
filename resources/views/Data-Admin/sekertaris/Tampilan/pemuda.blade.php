@extends('Data-Admin.sekertaris.template')
@section('content')
{{-- Halaman content --}}
<div class="container">
    <div class="row mt-5">
      <div class="card">
         <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Pengurus Pemuda') }}</div>
             <hr>
         </div>
   <h3 class="text-center" style="font-family:Arial Black" >Data Ketua Pemuda</h3>
    <br>
    
     @if ($message = Session::get('sukses'))
     <div class="alert alert-success">
       <p>{{ $message }}</p>
      </div>
     @endif
     <div class="col-lg-11 margin-tb"">
    <div class="card" style="background:rgb(220, 213, 226)" >
     <div class="card-header">
            <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5" >
             <tr  style="background: rgb(23, 95, 204)">
                <th class="text-center" style="font-family: Arial black">#</th>
                <th class="text-center" style="font-family: Arial black" >NIK</th>
                <th class="text-center" style="font-family: Arial black" >Nama</th>
                <th class="text-center" style="font-family: Arial black" >Masa Jabatan</th>
                <th class="text-center" style="font-family: Arial black" >Alamat</th>
             </tr>
             @foreach ($pemuda as $item)
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
</div>
@endsection