@extends('Tampilan-User.template-user')
@section('content')
<section class="content">
  <div class="card-body">
    <h3 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Pusat</h3>
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr>
           <th> NO</th>
           <th> PROGRAM</th>
           <th> TUJUAN PROGRAM</th>
           <th> WAKTU PELAKSANAAN</th>
           <th> KETERANGAN/SASARAN</th>
        </tr>
      @foreach ($program_pusat as $programpusat)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programpusat->program }}</td>
          <td>{{ $programpusat->tujuan }}</td>
          <td>{{ $programpusat->waktu}}</td>
          <td>{{ $programpusat->sasaran }}</td>
          </tr>
          <b style="font-family: initial">Tanggal: {{ $programpusat->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
          <hr class="col-lg-2">
      @endforeach
     </table>
  </div>
</section>
@endsection