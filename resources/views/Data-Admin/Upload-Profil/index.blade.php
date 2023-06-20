@extends('Data-Admin.sekertaris.template')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Upload Profile') }}</div>
                    <hr>
                </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h4 class="text-center" style="font-family:Arial Black" >Upload Profile</h4>
    
<div class="container">
    
    &nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row">
    <div class="col-lg-6 mt-5">
        {{-- <a class="btn btn-success" href="{{ route('profile.create') }}"> <i class="fa fa-plus"> Tambah Data</i> </a> --}}
        @forelse($profil as $key => $item)
        <br><br>
         <h4 style="font-family: Arial, black"> <b>Ketua Pusat Pemuda GIDI</b></h4></center> 
            <div class="card shadow">
              <a href="/image/{{ $item->image }}">
                <img src="/image/{{ $item->image }}" width="300px" height="200" >
              </a>
              <div class="card-body">
                <div class="card-title fw-bold text-primary h4"> <h4>{{ $item->nama}}</h4></div>
                    <a class="btn btn-warning  " href="{{ route('profile.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>

              </div>
            </div>
        </div>
        @endforeach
        {{-- <a class="btn btn-success" href="{{ url('sprofile/create_ketua') }}"> <i class="fa fa-plus"> Tambah Data</i> </a> --}}
       <br><br>
      
   
        @forelse($profile as $key => $item)
        <div class="col-lg-5 mt-5">
            <h4 style="font-family: Arial, black"> <b> Wakil Ketua Pusat Pemuda GIDI </b></h4>
            <div class="card shadow">
              <a href="/image/{{ $item->image}}">
                <img src="/image/{{ $item->image }}" width="300px" height="200" >
              </a>
              <div class="card-body">
                <div class="card-title fw-bold text-primary h4"> <h4>{{ $item->nama}}</h4></div>
                    <a class="btn btn-warning  " href="{{ url('sprofile/edit_ketua',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>
            </div>
        </div>
    </div>
        @endforeach
</div>
</div>
    @endsection