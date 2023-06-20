
@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
 </div>
<div class="container">
<div class="card col-lg-11">
    <div class="card-header">
        <h4 class="text-center">Form Dana Lain <b>Keuangan</b></h4>
    </div> 
    <div class="col-lg-11">
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
  <div class="card-body">
<form action="{{ route('bkeuangan.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial, black" >Keterangan:</strong>
                <textarea name="keterangan" class="form-control" placeholder="Keterangan" cols="20" rows="5"></textarea>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <label style="font-family: Arial, black" >Jenis Keuangan :</label>
                <select class="form-control" name="jenis">
                    <option value="">Pilih</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial, black" >Nominal :</strong>
                <input  type="text" placeholder="Jumlah Uang" name="jumlah" class="form-control">
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
                <button type="submit" class="btn-sm btn btn-success"><h4>Simpan</h4></button>
        </div>
    </div>
   
</form>
</div>
</div>
</div>


@endsection

@section('rupiah')
<script src="{{ asset('js/autoNumeric.min.js') }}">
    $(document).ready(function() {
      $('#rupiah').autoNumeric('init', {
          aSep: '.',
          aDec: ',',
          aSign: 'Rp ',
          vMin: '0',
          vMax: '999999999'
      });
  });
    </script>
@endsection

