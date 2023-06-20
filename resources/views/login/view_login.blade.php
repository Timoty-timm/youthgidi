
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Sistem Pemuda GIDI</title>
         <!-- Tema style -->
         <link href="/images/gidi.jpg" rel="icon">
        <link rel="stylesheet" href="{{URL::to('/dist/css/AdminLTE.min.css')}}">
         <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{URL::to('/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <style>
            body{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                background-image: url(/able/assets/img/mata.jpg);
                background-size: cover;
        }
        h1{
            text-emphasis: none;
            text-combine-upright: 100%;
            color: white;
        }
        h5{
            text-emphasis: none;
            color: white;
        }
          </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

</head>
{{-- <body class="hold-transition login-page"> --}}
<body class="hold-transition">
<div class="login-box">
  <div class="login-logo" href="/able/dist/img/login_foto.jpg" img="dist/img/login_foto.jpg">
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
    <h1 style="font-family: Arial, Helvetica, sans-serif" >Pemuda GIDI</h1>
  </div>
  <!-- /.login-logo -->
  <div class="">
    <div class="card-body login-card-body">
        <div class="text-center">
        {{-- <img src="dist/img/logo_pemudagidi.png" class="img-circle text-center" alt="User Image" style="width: 20%; hight: 9px;" > --}}
        </div><br>

      <form action="{{url('login/proses')}}" method="POST">
        <h5>Username</h5>
        @csrf

        <div class="input-group mb-3">

          <input type="text" autofocus name="username" class="form-control"
         @errors('username')
         is-invalid
         @enderrors
          value="{{old('usename')}}" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>

        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
          </div>

        </div>
        <h5>Password</h5>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"
          @error('password')
          Is-Invalid
          @enderror
          placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- AdminLTE App -->
<script src="{{URL::to('/dist/js/adminlte.min.js')}}"></script>
<!-- jQuery 3 -->
<script src="{{URL::to('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::to('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
