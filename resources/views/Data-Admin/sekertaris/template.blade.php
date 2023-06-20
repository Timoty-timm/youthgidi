
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Sistem Informasi | Pemunda GIDI</title>
  
  <link href="/images/gidi.jpg" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/Ionicons/css/ionicons.min.css')}}">
     <!-- jvectormap -->
  <link rel="stylesheet" href="{{URL::to('/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Tema style -->
  <link rel="stylesheet" href="{{URL::to('/dist/css/AdminLTE.min.css')}}">
  <!-- Color and bakcground -->
  <link rel="stylesheet" href="{{URL::to('/dist/css/skins/_all-skins.min.css')}}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('sekertaris') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GI</b>DI</span>
          <!-- logo for regular state and mobile devices -->

        <span class="logo-lg"><img src="/images/gidi.jpg" class="img-circle" alt="GIDI" style="width:24%;" > <i class="fa-solid fa-hands-bound"></i>PEMUDA <b>GIDI</b></span></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

             <!-- Notifications Dropdown Menu -->
             {{-- <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">{{ $counts }}
                </span>
              </a>
              <ul class="dropdown-menu">  
                <li class="header "> <p style="color: rgb(199, 21, 146)"> Semua {{ $counts }} notifications yang ditampil</p></li>
                <li>
                  
                 
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li> --}}
            <!-- End Notofikasi -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown">
                <a href="#"
                 data-toggle="dropdown">
                 <i class="fa  fa-user"></i>
                 <b>{{Auth::user()->name}}</b> <b>{{Auth::user()->role}}</b>

                 <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">

                  <!-- Menu Ecount-->
                  <li class="user-footer">
                      <li><a href="{{url('password')}}"><i class="fa fa-gear fa-fw"></i> Ganti Passwor Baru</a></li><br>
                      <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                      <i class="fa-solid fa-right-from-bracket"></i>
                      <li class="divider"></li>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </div>
        </nav>
      </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <section class="sidebar">
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active menu-open">
          <a href="{{ url('sekertaris') }}">
            <i class="nav-icon fas fas fa-clinic-medical"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i>
            <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('visimisis')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Visi dan Misi</a></li>
            <li><a href="{{ url('organisasi') }}"><i class="fa fa-chevron-circle-down nav-icon"></i> Struktur Organisasi</a></li>
            <li><a href="{{ url('sejarah')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Sejarah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="nav-icon far fa-address-card"></i> <span> Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('spusat')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Data Kordinator Pusat</a></li>
            <li><a href="{{url('swilayah')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Data Pengurus Wilayah</a></li>
            <li><a href="{{url('sklasis')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Data Pengurus Klasis</a></li>
            <li><a href="{{url('spemuda')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Data Pengurus Pemuda</a></li>
            <li><a href="{{url('sanggota')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Data Anggota Pemuda</a></li>
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
            <li><a href="{{ url('sprogram-pusat') }}"><i class="	fa fa-chevron-circle-down nav-icon"></i> Kordinatr Pusat</a></li>
            <li><a href="{{ url('sprogram-wilayah') }}"><i class="fa fa-chevron-circle-down nav-icon"></i> Kordinator Wilayah</a></li>
            <li><a href="{{ url('sprogram-klasis') }}"><i class="fa fa-chevron-circle-down nav-icon"></i> Kordinator Klasis</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-dollar"></i> <span> Keuangan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('siuran') }}"><i class="fa fa-chevron-circle-down nav-icon"></i> Iuran Wajib</a></li>
              <li><a href="{{ url('sdanalain') }}"><i class="fa fa-chevron-circle-down nav-icon"></i> Dana Lain</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ url('kegiatan') }}">
              <i class="nav-icon fas fa-clone"></i> <span> Kegiatan</span>
            </a>
          </li>
          <li>
            <a href="{{url('renungan')}}">
              <i class="nav-icon fas fa-bible"></i> <span>Renungan</span>
            </a>
          </li>
        <li class="treeview">
            <a href="#">
              <i class="nav-icon fas fa-image"></i> <span> Galeri</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('video')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Video</a></li>
              <li><a href="{{url('foto')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Foto</a></li>
            </ul>
          </li>
          <li>
            <a href="{{url('register')}}">
              <i class="nav-icon fas fa-clone"></i> <span> Daftar Baru</span>
            </a>
          </li>
          <li>
            <a href="{{url('all-data')}}">
              <i class="nav-icon fas fa-address-card"></i> <span> Data Role</span>
            </a>
          </li>
           <li class="treeview">
            <a href="#">
              <i class="nav-icon fas fa-home"></i> <span>Beranda</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('pengumuman') }}"><i class="fa fa-chevron-circle-down nav-icon"></i>Pengumuman</a></li>
              <li><a href="{{ url('berita-duka') }}"><i class="fa fa-chevron-circle-down nav-icon"></i>Berita Duka</a></li>
              <li><a href="{{url('berita-terbaru')}}"><i class="fa fa-chevron-circle-down nav-icon"></i> Berita Terbaru </a></li>
              <li><a href="{{url('ulang')}}"><i class="fa fa-chevron-circle-down nav-icon"></i>Ucapkan Ulang Tahun</a></li>
              <li><a href="{{url('profile')}}"><i class="fa fa-chevron-circle-down nav-icon"></i>Upload Profile</a></li>
              <li><a href="{{url('carousel')}}"><i class="fa fa-chevron-circle-down nav-icon"></i>Corousel</a></li>
            </ul>
          </li>
          <li>
        </li>
    </section>
    <!-- End sidebar -->
  </aside>

    <!--- ====================================== -->
    <!-- Content halaman admin -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li class="active"> Beranda</li>
      </ol>
    </section> --}}

    <section class="content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

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
@yield('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
          </div>
        </div>
       @yield('ckeditor') 
      
    </div>

    </section>
   
<!-- End Content halaman admin -->

  <!-- Halaman Footer -->
  <footer class="main-footer btn-primary text-center"  style="background: grey">
    <p class="text" style="color: white">
      <strong> Sistem Information Youth GIDI.  Copyright &copy; BPP. Badan Pengurus Pusat (GIDI).</strong> All rights reserved.
    </p>
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

