
@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="container">
   <div class="card">
      <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Video') }}</div>
          <hr>
      </div>
    <div class="panel-body col-lg-11">
       <div class="panel-heading">
        <h4 class="text-center" style="font-family:Arial Black" >Form Data Video</h4>
       </div>
     
          @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                 <strong>{{ $message }}</strong>
              </div>
          @endif

          @if (count($errors) > 0)
          <div class="alert alert-danger">
             <strong>Whoops!</strong> There were some problems with your input.
             <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
             </ul>
          </div>
          @endif

          <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="row">

                <div class="col-md-12">
                   <div class="form-group">
                      <label style="font-family: Arial black" >Judul:</label>
                      <input type="text" name="judul" class="form-control"/>
                   </div>
                </div>
                   
                <div class="col-md-12">
                   <div class="form-group">
                      <label style="font-family: Arial black" >Deskripsi:</label>
                      <input type="text"   name="desk"   class="form-control"/>
                   </div>
                </div>
                   <div class="col-md-12">
                   <div class="form-group">
                      <label style="font-family: Arial black" >Upload Video:</label>
                      <input type="file" name="path" class="form-control"/>
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="form-group">
                      <button type="submit" class="btn-sm btn btn-success"><h4><b>Simpan</b></h4></button>
                   </div>
                </div>

             </div>
          </form>
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


   