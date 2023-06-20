@extends('Data-Admin.sekertaris.template')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Iuran Wajib') }}</div>
        <hr>
    </div>
  <div class="card-body">
    <h4 class="text-center" style="font-family:Arial Black" >Data Iuran Wajib  Pemuda GIDI</h4>
    <br><br>
    @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="card" style="background: rgb(220, 213, 226)">
      <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
        <tr style="background: rgb(23, 95, 204)" >
           <th class="text-center" style="font-family: Arial, black" > #</th>
           <th class="text-center" style="font-family: Arial, black" > Nama</th>
           <th class="text-center" style="font-family: Arial, black" > Wilayah</th>
           <th class="text-center" style="font-family: Arial, black" > Nominal</th>
        </tr>
      @foreach ($iuran as $iuranwajib)
        <tr>
          <td class="text-center">{{ ++$i }}</td>
          <td>{{ $iuranwajib->name }}</td>
          <td>{{ $iuranwajib->wilayah }}</td>
          <td class="text-center">Rp {{ number_format($iuranwajib->nominal, 0, ',', '.') }}</td>
          </tr>
      @endforeach
     </table>
  </div>
  </div>
  {{ $iuran->links() }}
</section>
@endsection