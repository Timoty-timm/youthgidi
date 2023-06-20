@extends('Tampilan-User.template-user')
@section('content')

    <h3 class="text-center" style="font-family:Arial Black" >Video</h3>
<hr>
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
           
            <div class="card-title fw-bold text-primary h4">{{ $item->judul }}</div>
            <p class="text-secondary">{!! $item->desk !!}</p><br>
            <b style="font-family: initial">Tanggal: {{ $item->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
             <hr>
          </div>
        </div>
    </div>
    @endforeach
  </div>
    @endsection