@extends('Tampilan-User.template-user')
@section('content')
<h4 class="text-center">Laporan Keuangan <strong>GIDI Pemuda</strong></h4><hr>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <h4>Pemasukan Dana</h4>
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

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <h4>Pengeluaran Dana</h4>        
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
@endsection