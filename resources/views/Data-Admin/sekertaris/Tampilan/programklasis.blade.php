@extends('Data-Admin.sekertaris.template')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Program Klasis') }}</div>
        <hr>
    </div>
  <div class="card-body">
    <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Klasis</h4>
    <br><br>
    <div class="card" style="background: rgb(220, 213, 226)">
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr style="background:  rgb(23, 95, 204)">
           <th style="font-family: Arial, black" class="text-center" > #</th>
           <th style="font-family: Arial, black" class="text-center" > PROGRAM</th>
           <th style="font-family: Arial, black" class="text-center" > TUJUAN PROGRAM</th>
           <th style="font-family: Arial, black" class="text-center" > WAKTU PELAKSANAAN</th>
           <th style="font-family: Arial, black" class="text-center" > KETERANGAN/SASARAN</th>
        </tr>
      @foreach ($program_klasis as $programklasis)
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