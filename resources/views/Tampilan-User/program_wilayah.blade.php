@extends('Tampilan-User.template-user')
@section('content')
<section class="content">
  <div class="card-body">
    <h3 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Wilayah</h3>
    <br><br>
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr>
           <th> NO</th>
           <th> PROGRAM</th>
           <th> TUJUAN PROGRAM</th>
           <th> WAKTU PELAKSANAAN</th>
           <th> KETERANGAN/SASARAN</th>
        </tr>
      @foreach ($program_wilayah as $programwilayah)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programwilayah->program }}</td>
          <td>{{ $programwilayah->tujuan }}</td>
          <td>{{ $programwilayah->waktu}}</td>
          <td>{{ $programwilayah->sasaran }}</td>
          </tr>
          <b style="font-family: initial">Tanggal: {{ $programwilayah->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
          <hr class="col-lg-2">
      @endforeach
     </table>
  </div>
</section>
@endsection