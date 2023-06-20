
<!--- ====================================== -->
@extends('Data-User.Wilayah.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Program Wilayah') }}</div>
  <hr>
</div>
<div class="container">
  <div class="row mt-5">
  <div class="col-lg-11 margin-tb">
      <div class="float-start">
        <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Wilayah</h4>
      </div>
      <div class="col-lg-12">
        @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
      </div>
      <div class="float-end">
          <a class="btn btn-success" href="{{route('wilayahs.create')}}"> <i class="fa fa-plus"> Tambah Data</i></a>
      </div><br>
<div class="card" style="background: rgb(220, 213, 226)">
  <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
    <tr style="background:  rgb(23, 95, 204)">
       <th class="text-center" style="font-family: Arial, black" >#</th>
       <th class="text-center" style="font-family: Arial, black" > Program</th>
       <th class="text-center" style="font-family: Arial, black" > Tujuan Program</th>
       <th class="text-center" style="font-family: Arial, black" > Waktu Plaksana</th>
       <th class="text-center" style="font-family: Arial, black" > Keterangan/Saranan</th>
       <th class="text-center" style="font-family: Arial, black" > Aksi</th>

    </tr>
  @foreach ( $wilayas as  $wilayah)
  <tr>
      <td class="text-center" >{{ ++$i }}</td>
      <td>{{  $wilayah->program }}</td>
      <td>{{  $wilayah->tujuan }}</td>
      <td>{{  $wilayah->waktu }}</td>
      <td>{{  $wilayah->sasaran }}</td>
      <td class="text-center">
          <form action="{{ route('wilayahs.destroy', $wilayah->id) }}" method="POST">
              <a class="btn btn-warning" href="{{ route('wilayahs.edit', $wilayah->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>
              @csrf
              @method('DELETE')
              {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
          </form>
      </td>
  </tr>
  @endforeach
</table>
</div>
</div>
</div>
</div>
@endsection