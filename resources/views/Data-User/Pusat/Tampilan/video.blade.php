@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
  <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Video') }}</div>
  <hr>
</div>
<br>
<h4 class="text-center" style="font-family:Arial Black" > Video</h4>
<br>
<div class="row">
    @forelse($video as $key => $item)
    <div class="col-lg-4">
       <br>
        <div class="card shadow">
            <a href="{{ $item->path }}">
                <video width="339" height="140" controls>
                    {{-- <iframe width="560" height="315" src="{{ asset($product->path) }}"  type="video/mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                    <source src="{{ asset($item->path) }}" type="video/mp4" width="870" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </video>
              </a>
          <div class="card-body">
           
            <div class="card-title fw-bold text-primary h4"> <h4> {{ $item->judul }}</h4></div>
            <p class="text-secondary">{{$item->desk}}</p><br>
             
          </div>
        </div>
    </div>
    @endforeach
  </div>
    @endsection