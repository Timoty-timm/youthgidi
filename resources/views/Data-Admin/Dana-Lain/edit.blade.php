
@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
 </div>
<div class="container">
    <div class="card col-lg-11">
        <div class="card-header">
            <h4 class="text-center">Ubah Dana Lain <b>Keuangan</b></h4>
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
     
      
        <form action="{{ route('bkeuangan.update',$keuangan->id) }}" method="POST">
            @csrf
            @method('PUT')
       
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong  style="font-family: Arial, black" >Keterangan:</strong>
                        <input type="text" name="keterangan" value="{{ $keuangan->keterangan }}" class="form-control" placeholder="Keterangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label  style="font-family: Arial, black" >Jenis Keuangan :</label>
                        <select class="form-control" name="jenis" value="{{ $keuangan->jenis }}">
                            <option  style="font-family: Arial, black"value="pemasukan">Pemasukan</option>
                            <option style="font-family: Arial, black" value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong  style="font-family: Arial, black" >Nominal :</strong>
                        <input type="text" name="jumlah" value="{{ $keuangan->jumlah }}" class="form-control" placeholder="Nominal">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <button type="submit" class="btn-sm btn btn-success"><h4>Simpan</h4></button>
                </div>
            </div>
       
        </form>
    </div>
    </div>
    </div>
@endsection
