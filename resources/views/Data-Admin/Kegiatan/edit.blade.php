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
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Ubah Data Kegiatan</h4>
    <form action="{{ route('kegiatan.update',$kegiatan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Judul:</strong>
                    <input type="text" name="judul" value="{{ $kegiatan->judul }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Isi:</strong>
                    <textarea class="form-control" id="editor" style="height:150px" name="isi" placeholder="Isi">{{ $kegiatan->isi }}</textarea>
                </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong style="font-family: Arial black" >Upload Foto:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $kegiatan->image }}" width="200px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <button type="submit" class="btn btn-success"> <h4><b>Simpan</b></h4></button>
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