@extends('Data-User.Wilayah.template-user')
@section('content')

<div class="card">
  <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Program Klasis') }}</div>
  <hr>
</div>
<section class="content">
  <div class="card-body">
    <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Klasis</h4>
    <br><br>
    <div class="card" style="background: rgb(220, 213, 226)">
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr style="background:  rgb(23, 95, 204)">
           <th style="font-family: Arial, black" class="text-center" > #</th>
           <th style="font-family: Arial, black" class="text-center" > Program</th>
           <th style="font-family: Arial, black" class="text-center" > Tujuan Program</th>
           <th style="font-family: Arial, black" class="text-center" > Waktu Pelaksana</th>
           <th style="font-family: Arial, black" class="text-center" > Keterangan/Sasaran</th>
        </tr>
      @foreach ($program as $programklasis)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programklasis->program }}</td>
          <td>{{ $programklasis->tujuan }}</td>
          <td>{{ $programklasis->created_at->tz('Asia/Jakarta')->format('d M Y H:i')}}</td>
          <td>{{ $programklasis->sasaran }}</td>
          </tr>
      @endforeach
     </table>
  </div>
  </div>
</section>
  @endsection