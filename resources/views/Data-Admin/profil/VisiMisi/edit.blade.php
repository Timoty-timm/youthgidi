@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Visi & Misi') }}</div>
        <hr>
    </div>
    <div class="card mt-5">
        <div class="card-header">
          <h4 class="text-center" style="font-family:Arial Black" >Ubah Visi & Misi</h4>
        </div>
        <div class="card-body">
            <div class="row">

            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
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

                    <form action="{{ route('visimisis.update',$visimisi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                         <div class="row">
                            <div class="col-xs-11 col-sm-11 col-md-11">
                                <div class="form-group">
                                    <strong style="font-family: Arial black" >Judul:</strong>
                                    <input type="text" name="judul" value="{{ $visimisi->judul }}" class="form-control" placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-xs-11 col-sm-11 col-md-11">
                                <div class="form-group">
                                    <strong style="font-family: Arial black" >Isi:</strong>
                                    <textarea class="form-control" style="height:150px" name="isi" id="editor" placeholder="Isi">{{ $visimisi->isi }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-11 col-sm-11 col-md-11">
                              <button type="submit" class="btn btn-success"> <h4><b>Simpan</b></h4> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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