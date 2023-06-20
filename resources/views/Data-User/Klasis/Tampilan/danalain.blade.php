@extends('Data-User.Klasis.tampilan-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
</div>
<br>
<h4 class="text-center"> <b> Laporan Keuangan Pemuda (GIDI)</b></h4>
<div class="card" style="background: white">
<table  class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
    <thead>
        <tr>
            <th style="font-family: Arial black">Tanggal</th>
            <th style="font-family: Arial black">Keterangan</th>
            <th style="font-family: Arial black">Nominal</th>
        </tr>
    </thead>
    <h4 style="font-family: Arial black">Pemasukan Dana</h4>
    <hr>
    <tbody>
        @foreach($pemasukan1 as $p)
        <tr>
            <td>{{ $p->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4"><strong>Total Pemasukan:  Rp {{ number_format($pemasukan, 0, ',', '.') }} </strong></td>           
        </tr>
    </tbody>    
    </tbody>

</table>

<table  class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
    <thead>
        <tr>
            <th style="font-family: Arial black">Tanggal</th>
            <th style="font-family: Arial black">Keterangan</th>
            <th style="font-family: Arial black">Nominal</th>
        </tr>
    </thead>
    <h4 style="font-family: Arial black">Pengeluaran Dana</h4>        
    <hr>
    <tbody>
        @foreach($pengeluaran1 as $p)
        <tr>
            <td>{{ $p->created_at->tz('Asia/Jakarta')->format('d M Y H:i')}}</td>
            <td>{{ $p->keterangan }}</td>
            <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }} </td>
        </tr>
        @endforeach
        <tfoot>    
            <tr>
                <td colspan="3"><strong>Total Pengeluaran:  Rp {{ number_format($pengeluaran, 0, ',', '.') }}</strong></td>
                          
            </tr>
            <tr>
                <td colspan="3"><strong>Total saldo :  Rp {{ number_format($saldo, 0, ',', '.') }}</strong></td>            
            </tr>
        </tfoot>
      </table>
    </div>
@endsection