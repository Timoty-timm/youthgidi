@extends('Data-User.Wilayah.template-user')
@section('content')  <div class="card">
  <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Ketua Wilayah') }}</div>
  <hr>
</div>
<div class="container">
    <div class="card col-lg-10">
     <!-- Validasi errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
   <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
     @endforeach
      </ul>
      </div>
         @endif
         <div class="mb-3 col-lg-12">
 @if ($message = Session::get('sukses'))
 <div class="alert alert-success">
   <p>{{ $message }}</p>
  </div>
 @endif
 </div>
         <section class="conatent">
            @yield('content')
         </section>

        <div class="card-body">

          <h4 class="text-center" style="font-family:Arial Black" >Data Ketua Wilayah</h4>
              <div class="card-body">
                <form action="{{url('dwilayah/store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">NIK</label>
                      <input type="text"  placeholder="NIK" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Nama</label>
                      <input type="text" placeholder="Nama"  name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Masa Jabatan</label>
                      <input type="text"  placeholder="Masa Jabatan" name="masajabatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label style="font-family: Arial, black" for="exampleInputEmail1" class="form-label">Alamat</label>
                      <input type="text"  placeholder="Alamat" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div><br>
                    <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
                  </form>
            </div>


        </div>
    </div>
</div>
@endsection