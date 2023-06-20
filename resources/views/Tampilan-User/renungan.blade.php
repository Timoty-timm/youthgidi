@extends('Tampilan-User.template-user')
@section('content')
<section class="container">
  <h3 class="text-center" style="font-family:Arial Black" >Renungan</h3>
  <br><br>
  <div class="row">
    @forelse($renungan as $key => $product)
    <div class="col-lg-4 ">
       <br>
        <div class="card shadow ">
         
          <div class="card-body ">
           
            <div class="card-title fw-bold text-primary h4 text-center">{{ $product->judul }}</div><br>
            <p class="text-secondary">{!!$product->isi!!}</p><br>
            <b style="font-family: initial">Tanggal: {{ $product->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
             <hr>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</section>
@endsection