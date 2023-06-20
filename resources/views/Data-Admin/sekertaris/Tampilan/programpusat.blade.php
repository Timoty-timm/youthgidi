@extends('Data-Admin.sekertaris.template')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Program Pusat') }}</div>
        <hr>
    </div>
  <div class="card-body" >
    <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Pusat</h4><br><br>
    <div class="card" style="background: rgb(220, 213, 226)">
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr style="background:  rgb(23, 95, 204)">
           <th class="text-center" style="font-family: Arial, black" > #</th>
           <th class="text-center" style="font-family: Arial, black" > Program</th>
           <th class="text-center" style="font-family: Arial, black" > Tujuan Program</th>
           <th class="text-center" style="font-family: Arial, black" > Waktu Pelaksanan</th>
           <th class="text-center" style="font-family: Arial, black" > Keterangan/Saranan</th>
        </tr>
      @foreach ($program_pusat as $programpusat)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programpusat->program }}</td>
          <td>{{ $programpusat->tujuan }}</td>
          <td>{{ $programpusat->created_at->tz('Asia/Jakarta')->format('d M Y H:i')}}</td>
          <td>{{ $programpusat->sasaran }}</td>
          </tr>
      @endforeach
     </table>
  </div>
  </div>
</section>
@endsection