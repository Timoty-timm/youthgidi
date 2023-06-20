@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Kegiatan') }}</div>
                    <hr>
            </div>
       
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>Ada beberapa masalah dengan masukan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <h4 class="text-center" style="font-family:Arial Black" >Form Data Kegiatan</h4>

<form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial black">Judul:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul">
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial black">Isi:</strong>
                <textarea class="form-control" id="editor" style="height:150px" name="isi" placeholder="Isi"></textarea>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong style="font-family: Arial black">Upload Foto:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11 ">
                <button type="submit" class="btn btn-success"><h4><b>Simpan</b></h4></button>
        </div>
    </div>
</form>

@endsection
@section('ckeditor')
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
<!-- ================ -->