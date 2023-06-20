
@extends('Tampilan-User.template-user')
@section('content')

<div class="container">
    <h1>Data Ketua Pusat</h1>
    <div class="mb-3 col-lg-12">
     @if ($message = Session::get('sukses'))
     <div class="alert alert-success">
       <p>{{ $message }}</p>
      </div>
     @endif
     </div>
    <div class="card">
     <div class="card-header">
            <table  class="table table-bordered table-striped table-hover" id="table-datatable" >
             <tr>
                <th>NO</th>
                <th>NIK</th>

                <th>Masa Jabatan</th>
                <th>Alamat</th>
                <th>Aksi</th>
             </tr>
             @foreach ($post as $item)
             <tr>
                <td>{{ ++$i }}</td>
                <td>{{$item->nik}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->masajabatan}}</td>
                <td>{{$item->alamat}}</td>
             </tr>
            @endforeach
      </table>
    </div>
   </div>
  </div>
</div>
</div>


@endsection
