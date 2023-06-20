@extends('Data-Admin.sekertaris.template')
@section('content')
<h4 class="text-center" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" >Iuran Wajib</h4>

<div class="row">
    

     <div class="col-lg-12 ">
    <div class="card shadow ">
 
    <div class="card-body ">
   @foreach ($iuran as $iuran)
     
   <div class="card-title fw-bold text-primary h4 ">  </div>
   <b> Wilayah:</b> {{ $iuran->wilayah }}
   <p class="text-secondary"> Uang Pemasukkan:  Rp {{ number_format($iuran->nominal, 0, ',', '.') }}</p>
   
   Tanggal: {{ $iuran->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}
   
   <hr>
   @endforeach
  </div>
</div>
</div>

    @endsection