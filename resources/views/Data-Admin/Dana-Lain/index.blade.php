@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
 </div>
<br>
<h4 class="text-center" style="font-family: Arial, black" >Laporan Keuangan <strong>Pemuda GIDI</strong></h4>
<a href="{{ url('bkeuangan/create') }}" class="btn btn-sm btn-success"> <i class="fa fa-plus"> Tambah</i> </a><br><br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr style="font-family:Arial Black">
            <th style="font-family: Arial, black">Tanggal</th>
            <th style="font-family: Arial, black">Keterangan</th>
            <th style="font-family: Arial, black">Nominal</th>
            <th class="text-center" style="font-family: Arial, black">Aksi</th>
        </tr>
    </thead>
    <h4 style="font-family:Arial Black">Pemasukan Dana</h4>
    <hr>
    <tbody>
        @foreach($pemasukan1 as $p)
        <tr >
            <td >{{ $p->created_at->tz('Asia/Jakarta')->format('d M Y H:i')}}</td>
            <td >{{ $p->keterangan }}</td>
            <td >Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
            <td class="text-center">
                <form action="{{ route('bkeuangan.destroy',$p->id) }}" method="POST">
                    {{-- <a class="btn btn-success btn-sm " href="{{ route('bkeuangan.edit',$p->id) }}"> <i class="fa fa-edit"> Ubah</i> </a> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "> <i class="fa fa-trash"></i> Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" style="font-family:Arial Black"><strong>Total Pemasukan:  Rp {{ number_format($pemasukan, 0, ',', '.') }} </strong></td>           
        </tr>
    </tbody>    
    </tbody>

</table>

<table class="table table-bordered">
    <thead>
        <tr style="font-family:Arial Black">
            <th style="font-family: Arial, black">Tanggal</th>
            <th style="font-family: Arial, black">Keterangan</th>
            <th style="font-family: Arial, black">Nominal</th>
            <th style="font-family: Arial, black" class="text-center">Aksi</th>
        </tr>
    </thead>
    <h4 style="font-family:Arial Black">Pengeluaran Dana</h4>        
    <hr>
    <tbody>
        @foreach($pengeluaran1 as $p)
        <tr>
            <td>{{ $p->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }} </td>
            <td class="text-center" colspan="1" >
                <form action="{{ route('bkeuangan.destroy',$p->id) }}" method="POST">
                    {{-- <a class="btn btn-success btn-sm " href="{{ route('bkeuangan.edit',$p->id) }}"><i class="fa fa-edit"> Ubah</i></a> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-trash"> Hapus</i></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tfoot>    
            <tr>
                <td colspan="3" style="font-family:Arial Black"><strong>Total Pengeluaran:  Rp {{ number_format($pengeluaran, 0, ',', '.') }}</strong></td>
                          
            </tr>
            <tr>
                <td colspan="3" style="font-family:Arial Black" ><strong>Total saldo :  Rp {{ number_format($saldo, 0, ',', '.') }}</strong></td>            
            </tr>
        </tfoot>
      </table>


@endsection