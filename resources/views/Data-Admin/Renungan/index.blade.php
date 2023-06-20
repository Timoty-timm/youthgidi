@extends('Data-Admin.sekertaris.template')
@section('content')
    <div class="container">
      <div class="card">
        <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Renungan') }}</div>
            <hr>
        </div>
      <h4 class="text-center" style="font-family:Arial Black" >Data Renungan</h4>
      <div class="col-lg-10">
        @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
  @endif 
    </div>
    <div class="container col-lg-10">
        
       
      <a href="{{ route('renungan.create') }}" class="btn  btn-success" ><i class="fa fa-plus"> Tambah Renungan</i></a>
        <div class="row justify-content-center">
          @foreach ($renungan as $post)
            <div class="col-md-10">
             
                <div class="card border-1 shadow-sm rounded">
                  
                    <div class="card-body">
                     
                        
                        <img src="" class="w-100 rounded">
                        <br>
                        <a href="{{ route('renungan.edit', $post->id) }}" class="btn  btn-warning" ><i class="fa fa-edit"> Ubah</i></a>
                       
                        <h4 style="font-family: Arial black">Judul Firman :</h4> <b>{{ $post->judul }}</b>
                        <p class="tmt-3">
                        <h4 style="font-family: Arial black" >Isi Firman : </h4> {!! $post->isi !!}
                        </p>      
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   
</div>

@endsection