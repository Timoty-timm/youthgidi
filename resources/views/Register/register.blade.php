@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Register') }}</div>
            <hr>
        </div>
  <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
            {{-- <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4> --}}

            <h4 class="text-center" style="font-family:Arial Black" >Daftar Anggota Baru</h4>
            @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif


              <div class="card-body">
                  <form method="POST" action="{{url('register') }}">
                      @csrf
                      {{-- kkk --}}
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong style="font-family: Arial Black">Nama:</strong>
                                <input id="name" placeholder="Nama" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong style="font-family: Arial Black">{{ __('Username') }}</strong>
                              <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                              @error('username')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                               
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong style="font-family: Arial Black">Email:</strong>
                              <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong style="font-family: Arial Black">Password:</strong>
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong style="font-family: Arial Black">Level:</strong>
                        <select style="font-family: Arial Black" name='level' class="form-control">
                        <option style="font-family: Arial Black" id="1" value='1'>Ketua Pusat</option>
                        <option style="font-family: Arial Black" id="2" value='2'>Ketua Wilayah</option>
                        <option style="font-family: Arial Black" id="3" value='3'>Ketua Klasis</option>
                        <option style="font-family: Arial Black" id="4" value='4'>Ketua Pemunda</option>
                        <option style="font-family: Arial Black" id="5" value='5'>Anggota Pemuda</option>
                        <option style="font-family: Arial Black" id="7" value='7'>Bendahara</option>
                           </select>

                              @error('level')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                  </div>
  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
                        </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection