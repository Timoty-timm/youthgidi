@extends('Tampilan-User.template-user')
@section('content')
<section class="container">
    <h3 class="text-center" style="font-family:Arial Black" >Sejarah</h3>
  <div class="card shadow">
        @foreach ($sejarah as $sejaras)
        <div class="row ">
            <div class="col">
                {{-- <H1> Sejarah</H1> --}}
             <center><h4  style="font-family: Arial, black">{{$sejaras->judul}}</h4></center>   
                <p>{!! $sejaras->isi!!}</p> <br><br>
                <b style="font-family: initial">Tanggal: {{ $sejaras->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
                    <hr>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection