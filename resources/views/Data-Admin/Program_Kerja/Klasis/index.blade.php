
<!--- ====================================== -->
@extends('Data-User.Klasis.tampilan-user')
@section('content')

<div class="card">
  <div class="card-header"> <a href="{{ url('klasis') }}">Home</a> {{ __('/ Program Klasis') }}</div>
    <hr>
</div>
<div class="container">
  <div class="row mt-5">
    <div class="float-start">
      <h4 class="text-center" style="font-family:Arial Black" >Program Kerja Ketua Klasis</h4>
    </div>
  <div class="col-lg-11 margin-tb">
@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
  </div>
<div class="float-end">
  <a class="btn btn-success" href="{{route('klasiss.create')}}"> <i class="fa fa-plus"> Tambah Data</i></a>
</div><br>
<div class="col-lg-11 margin-tb">
<div class="card" style="background: rgb(220, 213, 226)">
  <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="5">
    <tr style="background:  rgb(23, 95, 204)">
       <th style="font-family: Arial, black" class="text-center" > #</th>
       <th style="font-family: Arial, black" class="text-center" > Program</th>
       <th style="font-family: Arial, black" class="text-center" > Tujuan Program</th>
       <th style="font-family: Arial, black" class="text-center" > Waktu Pelaksana</th>
       <th style="font-family: Arial, black" class="text-center" > Keterangan/Sasaran</th>
       <th style="font-family: Arial, black" class="text-center" > Aksi</th>

    </tr>
  @foreach ( $klasiss as  $klasiss)
  <tr>
      <td class="text-center" >{{ ++$i }}</td>
      <td>{{  $klasiss->program }}</td>
      <td>{{  $klasiss->tujuan }}</td>
      <td>{{  $klasiss->waktu }}</td>
      <td>{{  $klasiss->sasaran }}</td>
      <td class="text-center">
          <form action="{{ route('klasiss.destroy', $klasiss->id) }}" method="POST">
              <a class="btn btn-warning" href="{{ route('klasiss.edit', $klasiss->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>
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