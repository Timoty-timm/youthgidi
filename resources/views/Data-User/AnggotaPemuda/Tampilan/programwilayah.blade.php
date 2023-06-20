@extends('Data-User.AnggotaPemuda.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('anggotapemuda') }}">Home</a> {{ __('/ Program Wilayah') }}</div>
    <hr>
</div>
<section class="content">
  <div class="card-body" >
    <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Wilayah</h4><br><br>
    <div class="card" style="background: rgb(220, 213, 226)">
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr style="background:  rgb(23, 95, 204)">
           <th class="text-center" style="font-family: Arial, black" > #</th>
           <th class="text-center" style="font-family: Arial, black" > Program</th>
           <th class="text-center" style="font-family: Arial, black" > Tujuan Program</th>
           <th class="text-center" style="font-family: Arial, black" > Waktu Pelaksana</th>
           <th class="text-center" style="font-family: Arial, black" > Keterangan/Saranan</th>
        </tr>
      @foreach ($wilayah as $programwilayah)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programwilayah->program }}</td>
          <td>{{ $programwilayah->tujuan }}</td>
          <td>{{ $programwilayah->created_at->tz('Asia/Jakarta')->format('d M Y H:i')}}</td>
          <td>{{ $programwilayah->sasaran }}</td>
          </tr>
      @endforeach
     </table>
  </div>
  </div>
</section>
  @endsection