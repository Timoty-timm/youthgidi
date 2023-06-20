@extends('Tampilan-User.template-user')
@section('content')
<section class="content">
  <div class="card-body">
    <h3 class="text-center" style="font-family:Arial Black" >Membayar Iuran Wajib  Pemuda (GIDI)</h3>
    <br><br>
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr>
           <th class="text-center"> NO</th>
           <th class="text-center"> NAMA</th>
           <th class="text-center"> WILAYAH</th>
           <th class="text-center"> NOMINAL</th>
           {{-- <th class="text-center">TANGGAL</th> --}}
           {{-- <th> BUKTI TRANSFER</th> --}}
        </tr>
      @foreach ($iuran as $iuranwajib)
        <tr>
          <td class="text-center">{{ ++$i }}</td>
          <td>{{ $iuranwajib->name }}</td>
          <td>{{ $iuranwajib->wilayah }}</td>
          <td>Rp {{ number_format($iuranwajib->nominal, 0, ',', '.') }}</td>
          {{-- <td>{{ $iuranwajib->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</td> --}}
          </tr>
      @endforeach
     </table>

  </div>
 
</section>

@endsection