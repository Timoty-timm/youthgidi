@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi | Pemuda GIDI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/Ionicons/css/ionicons.min.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
  <link rel="shortcut icon" href="https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon.ico">

  <!-- jvectormap -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Tema style -->
  <link rel="stylesheet" href="{{URL::to('/dist/css/AdminLTE.min.css')}}">
  <!-- Color and bakcground -->
  <link rel="stylesheet" href="{{URL::to('/dist/css/skins/_all-skins.min.css')}}">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GI</b>DI</span>
      <!-- logo for regular state and mobile devices -->

    <span class="logo-lg"><img src="dist/img/logo_pemudagidi.png" class="img-circle" alt="GIDI" style="width:24%;" > <i class="fa-solid fa-hands-bound"></i>PEMUDA <b>GIDI</b></span></a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

         <!-- Notifications Dropdown Menu -->
         <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
     <!-- End Notofikasi -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
            <a href="#"
             data-toggle="dropdown">
             <i class="fa  fa-user"></i>
             <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">

              <!-- Menu Footer-->
              <li class="user-footer">

                  <li><a href="#"><i class="fa fa-user fa-fw"></i> Register</a></li>
                  <li><a href=""><i class="fa fa-gear fa-fw"></i> Ganti Password Baru</a></li>
                  <li class="divider"></li>
                 {{-- <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li> --}}

                   <div class=" text-center">
                  <a href="#" class="btn btn-danger mt-3 lg-2"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> Keluar </a>

                  <form id="logout-form" action="{{url('logout')}}" method="post" hidden>
                  @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>

         <!-- icon untuk mengubah warna tampilan admin -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
        <!-- End icon mengubah warna -->

        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="nav-icon fas fas fa-clinic-medical"></i> <span>Dashboard</span>
          </a>
        </li>
        {{-- <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Wone</span>
          </a>
        </li> --}}

        <li class="treeview">
          <a href="#">
            <i class="nav-icon fa fa-user-circle"></i>
            <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('visimisis.index')}}"><i class="fa fa-circle-o"></i> Visi dan Misi</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Struktur Organisasi</a></li>
            <li><a href="{{url('sejaras.index')}}"><i class="fa fa-circle-o"></i> Sejarah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i>
            <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('pusat.index')}}"><i class="fa fa-circle-o"></i> Data Ketua Pusat</a></li>
            <li><a href="{{url('wilayah.index')}}"><i class="fa fa-circle-o"></i> Data Ketua Wilayah</a></li>
            <li><a href="{{url('klasis.index')}}"><i class="fa fa-circle-o"></i> Data Ketua Klasis</a></li>
            <li><a href="{{url('pemuda.index')}}"><i class="fa fa-circle-o"></i> Data Ketua Pemuda</a></li>
            <li><a href="{{url('pemuda.index')}}"><i class="fa fa-circle-o"></i> Anggota Pemuda</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span> Program Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Tingkat Pusat</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Tingkat Wilayah</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Tingkat Klasis</a></li>
          </ul>
        </li>
        <li>
            <a href="pages/calendar.html">
              <i class="nav-icon fas fa-donate"></i> <span> Keuangan</span>
            </a>
          </li>
          <li>
            <a href="pages/calendar.html">
              <i class="nav-icon fas fa-donate"></i> <span> Kengiatan</span>
            </a>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-alkitab"></i> <span> Renungan</span>
          </a>
        </li>

        <li class="treeview">
          <li class="nav-item">
            <a href="#">
              <i class="fa fa-book"></i><span> Program Kerja</span>
            </a>
          </li>
        </li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span> Tambahan</span>
          </a>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-laptop"></i> <span> Admin</span></a></li>
      </ul>
    </section>
    <!-- End sidebar -->
  </aside>

  <!-- Content halaman admin -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li class="active"> Pengumuman</li>
      </ol>
    </section>
    <a href="#" class="btn btn-success btn-lg">
        <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <!-- Main content -->
    <section class="content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<p><h5>Hello Admin, Welcome my aplikasi </h5></p>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>100</h3>

                  <p>Laki-Laki</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                  {{-- <i class="ion ion-bag"></i> --}}
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>50<sup style="font-size: 20px">%</sup></h3>

                  <p>Perempuan</p>
                </div>
                <div class="icon">
                  {{-- <i class="ion ion-stats-bars"></i> --}}
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>150</h3>

                  <p>Semua Jumlah Anggota Pemunda</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </div>
@yield('mama')
    </section>
<!-- End Content halaman admin -->

  <!-- Halaman Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Sistem Information Youth GIDI.  Copyright &copy; BPP. Badan Pengurus Pusat (GIDI).</strong> All rights reserved.
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu">
          <li>
          </li>
        </ul>
      </div>
    </div>
  </aside>
</div>

<!-- jQuery 3 -->
<script src="{{URL::to('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::to('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::to('/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::to('/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{URL::to('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::to('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::to('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{URL::to('/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::to('/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::to('/dist/js/demo.js')}}"></script>
</body>
</html>
@endsection
