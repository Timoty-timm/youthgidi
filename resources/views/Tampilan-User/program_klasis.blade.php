@extends('Tampilan-User.template-user')
@section('content')
<section class="content">
  <div class="card-body">
    <h3 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Klasis</h3>
    <br><br>
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr>
           <th> NO</th>
           <th> PROGRAM</th>
           <th> TUJUAN PROGRAM</th>
           <th> WAKTU PELAKSANAAN</th>
           <th> KETERANGAN/SASARAN</th>
        </tr>
      @foreach ($program_klasis as $programklasis)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $programklasis->program }}</td>
          <td>{{ $programklasis->tujuan }}</td>
          <td>{{ $programklasis->waktu}}</td>
          <td>{{ $programklasis->sasaran }}</td>
          </tr>
          <b style="font-family: initial">Tanggal: {{ $programklasis->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
          <hr class="col-lg-2">
      @endforeach
     </table>
  </div>
</section>
@endsection