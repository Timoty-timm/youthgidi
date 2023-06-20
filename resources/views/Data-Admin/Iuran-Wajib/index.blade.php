@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
 </div>
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
          <h4 class="text-center" style="font-family:Arial Black" >Iuran Wajib</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('iuran.create') }}"> <i class="fa fa-plus">Tambah Data</i></a>
        </div>
    </div>
</div><br>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th class="text-center" style="font-family: Arial, black">#</th>
        <th class="text-center" style="font-family: Arial, black">Nama</th>
        <th class="text-center" style="font-family: Arial, black">Wilayah</th>
        <th class="text-center" style="font-family: Arial, black">Nominal</th>
        <th class="text-center" style="font-family: Arial, black">Bukti Transfer</th>
        <th class="text-center" width="280px" style="font-family: Arial, black">Aksi</th>
    </tr>
    @foreach ($iuran as $product)
    <tr>
        <td class="text-center">{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->wilayah}}</td>
        {{-- <td> Tanggal: {{ $product->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</td> --}}
        <td>Rp {{ number_format($product->nominal, 0, ',', '.') }}</td>
        <td class="text-center" >
          <a href="/image/{{ $product->image }}"> <img src="/image/{{ $product->image }}" height="40px" width="80px"></a> 
        </td>
        <td class="text-center">
            <form action="{{ route('iuran.destroy',$product->id) }}" method="POST">
                 <a href="{{ route('iuran.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-edit"> Ubah</i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $iuran->links() }}
@endsection