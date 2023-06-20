@extends('Data-User.Pusat.template-user')
@section('content')
    <!-- Halaman edit password -->
    <div class="card">
        <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Menganti Password') }}</div>
          <hr>
     </div>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                
                    <div class="card-header">
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success">
                   <p>{{ $message }}</p>            
                    </div>
                      @endif
                      @if ($errors->any())
                      <div class="alert alert-danger">
                     <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                       @endforeach
                        </ul>
                        </div>
                           @endif
                        <h3 class="text-center" style="font-family:Arial Black" >Ganti Password Baru</h3>
                        <br><br>
                    </div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('user.password.update') }}">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>
                            <div class="col-md-6">
                           <input id="current_password" type="password" class="form-control"  name="current_password">

                        
                        </div>
                     <br><br><br>
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                  
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmasi Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>

                            
                             <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                     <h4>   Simpan </h4>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
    
