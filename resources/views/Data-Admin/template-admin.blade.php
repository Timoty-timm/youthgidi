<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DataWilayah</title>
        <!-- Google Font: Source Sans Pro -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

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
            <li class="active treeview menu-open">
              <a href="#">
                <i class="nav-icon fas fas fa-clinic-medical"> &nbsp;Dashboard</i>
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
                <li><a href=""><i class="fa fa-chevron-circle-down"></i> Visi dan Misi</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Struktur Organisasi</a></li>
                <li><a href=""><i class="fa fa-chevron-circle-down"></i> Sejarah</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="nav-icon far fa-address-card"></i>
                <span> &nbsp;Data</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('ketuapusat') }}"><i class="fa fa-chevron-circle-down"></i> Data Kordinator Pusat</a></li>
                <li><a href="{{url('ketuawilayah')}}"><i class="fa fa-chevron-circle-down"></i> Data Pengurus Wilayah</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Data Pengurus Klasis</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Data Pengurus Pemunda</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Anggota Anggota Pemuda</a></li>
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
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Kordinatr Pusat</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Kordinator Wilayah</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Kordinator Klasis</a></li>
              </ul>
            </li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i> <span> Keuangan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Iuran Wajib</a></li>
                  <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Dana Lain</a></li>
                </ul>
              </li>
              <li>
                <a href="pages/calendar.html">
                  <i class="nav-icon fas fa-clone"></i> <span> &nbsp; Kengiatan</span>
                </a>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="nav-icon	fas fa-bible"></i> <span> &nbsp; Renungan</span>
              </a>
            </li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i> <span> Galeri</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-chevron-circle-down"></i> Video</a></li>
                  <li><a href="{{url('fotos')}}"><i class="fa fa-chevron-circle-down"></i> Foto</a></li>
                </ul>
            </li>
            </li>
        </section>
        </section>
        <!-- End sidebar -->
      </aside>

      <div class="content-wrapper">


            @section('content')
            <div class="container">
                <div class="card">
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
                        {{-- <form action="{{url('wilayah/store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">NIK</label>
                              <input type="text"  name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nama</label>
                              <input type="text"  name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Masa Jabatan</label>
                              <input type="text"  name="masajabatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Alamat</label>
                              <input type="text"  name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('wilayah')}}" class="btn btn-danger btn">Batal</a>
                          </form> --}}


                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Halaman Footer -->
<footer class="main-footer btn-primary text-center">
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

