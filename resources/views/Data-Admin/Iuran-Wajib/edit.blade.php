@extends('Data-User.Bendahara.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('bendahara') }}">Home</a> {{ __('/ Keuangan') }}</div>
      <hr>
 </div>
 <br>
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Data Iuran Wajib</h4>
    <div class="col-lg-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <form action="{{ route('iuran.update',$iuran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
           
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black">Wilayah:</strong>
                    <select id=""  name="wilayah" class="form-control" value="{{ $iuran->wilayah }}" >
                        <option style="font-family: Arial, black" value="{{ $iuran->wilayah }}">{{ $iuran->wilayah }}</option>
                        <option style="font-family: Arial, black" value="Toli">Toli</option>
                        <option style="font-family: Arial, black" value="Bogo">Bogo</option>
                        <option style="font-family: Arial, black" value="Yamo">Yamo</option>
                        <option style="font-family: Arial, black" value="Yahukimo">Yahukimo</option>
                        <option style="font-family: Arial, black" value="Pengunungan Bintang">Pengunungan Bintang</option>
                        <option style="font-family: Arial, black" value="Pantai Selatan">Pantai Selatan</option>
                        <option style="font-family: Arial, black" value="Pantai Utara">Pantai Utara</option>
                        <option style="font-family: Arial, black" value="Jasumbas">Jasumbas</option>
                    </select>
        
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black">Nominal:</strong>
                    <input type="text" required class="form-control" name="nominal" value="{{ $iuran->nominal }}"   placeholder="Nominal">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black">Bunti Transfer:</strong>
                    <input type="file" class="form-control" name="image" value="{{ $iuran->image }}" >
                    <img src="/image/{{ $iuran->image }}" width="100px"></td>
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10 ">
              <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
            </div>
        </div>

    </form>
@endsection
