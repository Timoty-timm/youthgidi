
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Web | Info Pemuda GIDI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/images/gidi.jpg" rel="icon">
  <link href="able/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700">
  <link href="able/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="able/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="able/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="able/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="able/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="able/assets/css/variables.css" rel="stylesheet">
  <link href="able/assets/css/main.css" rel="stylesheet">
  <link href="able/assets/css/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top col-12">
    <div class="container-fluid  d-flex align-items-center justify-content-between">
      <div class="row">
        <div class="col-md-2">
          <img class="animation__shake" src="images/gidi.jpg" alt="Logo_PemudaGIDI" height="60" width="60" style="border-radius:30px">
        </div>
        <div class="col-md-10 mt-2">
            <div class="col">
              <div><h5><b>PEMUDA GIDI</b></h5></div>
            <div>|Menjadi Pemuda yang Berkarakter <b>KRISTUS</b></div>
            </div>
        </div>
      </div>

      <nav id="navbar" class="navbar ml-5" >
        <ul class="nav-list">
         <li><a class="navbar-brand" href="/" style="color: white;"> Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
              <li><a href="{{url('user-vimisi')}}">Visi dan Misi</a></li>
              <li><a href="{{ url('user-organisasi') }}">Struktur Organisasi</a></li>
              <li><a href="{{url('user-sejarah')}}">Sejarah</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Program Kerja</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="{{url('user-programpusat')}}">Kordinator Pusat</a></li>
            <li><a href="{{url('user-programwilayah')}}"> Kordinator Wilayah</a></li>
            <li><a href="{{url('user-programklasis')}}"> Kordinatro Klasis</a></li>
          </ul>
          </li>
          <li><a href="{{ url('user-kegiatan') }}">Kegiatan</a></li>
          <li><a href="{{url('user-iuranwajib')}}">Iuran Wajib</a></li>
          <li><a href="{{url('user-renungan')}}">Renungan</a></li>
          <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('user-foto')}}">Foto</a></li>
              <li><a href="{{ url('user-video') }}">Video</a></li>
            </ul>
          </li>
          <li>
            <a href="{{url('/login')}}">
            <button class="button"> Login</button></a>
          </li>
        </ul>
      </nav>
      <!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2 js-search-open"></a>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">

            <button class="btn js-search-close"></button>
        </div>
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">   
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              
              <div class="swiper-wrapper">
                @foreach ($corousel as $carousel)
                  <div class="swiper-slide">
                      <a href="{{ url('beranda') }}" class="img-bg d-flex align-items-end text-white" style="background-image: url('/image/{{ $carousel->image }}');">
                        <div class="img-bg-inner">
                            <h4> <b>{{ $carousel->title}}</b></h4>
                            {!! $carousel->isi!!}
                       <b style="font-family: initial">Tanggal: {{ $carousel->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
                <hr>
                        </div>
                    </a>
                </div>
                @endforeach
              </div>

              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
              
            </div>
               
          </div>
        
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <!-- Jumlah Data Pemuda -->
    <div class="container">
    <div class="card">
        <div class="container">
           
                @yield('content')
               
            </div>
         </div>
         <br><br>
        </div>
               

  <!-- ======= Footer ======= -->
  <footer class="footer mt-8">
    <div class="container">
    <div class="footer" style="background-color: #090a0a; color: white;">
        <div class="row">
            <div class="footer-col col-md-5"><br>
                <h4> Pemuda GIDI Pusat</h4>
  
                    <p><a target="_BLANK" href="https://goo.gl/maps/8Do3jCLdmkPDe3PNA"><i class="fas fa-map-marker-alt" style="font-size:35px; color: white;"></i> Jl.
                        Raya Kemiri, Sentani Kota, Kec. Sentani, <br> Kabupaten Jayapura, Papua 99359.</a></p>
  
            </div>
            <div class="footer-col col-md-4"><br>
                <h4>Kontak Kami</h4>
                <ul>
                    <p><i class="fa fa-phone"></i> Phone: +00 081343265400</p>
                    <p><i class="fa fa-envelope"> </i> Email: info@gidi.go.id</p>
                    {{-- <p><a target="_BLANK" href="https://web.whatsapp.com/"><i class="fab fa-whatsapp"></i>&nbsp; 081212562775</a></p><br>
                    <p><a href="#"><i class="fas fa-phone"></i>&nbsp; 081212562775</a></p> --}}
                </ul>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="attendee_bottom" style="text-align: right;">
                  <p></p>
                  <h4>Media Sosial </h4>
                  <div class="reference-icons" style="padding-bottom: 60px;">
                    <ul>
                    <a href="https://www.facebook.com/groups/392109834268719/?ref=share&mibextid=NSMWBT" class="icon" target="_blank" data-on-event="send,event,social,click-post-attendee-page-facebook,Post-Attendee Page Facebook"><img src="https://st1.zoom.us/static/94172/image/new/home/IconFacebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/gidiyouthcenter/?igshid=YmMyMTA2M2Y%3D" class="icon" target="_blank"><img style="width:36px; height: 36px;margin-left: 5px;" src="https://st3.zoom.us/static/94172/image/new/home/IconInstagram.png" alt="Instagram"></a>
                    <a href="https://www.youtube.com/@gerejainjilidiindonesia8485" class="icon" target="_blank" data-on-event="send,event,social,click-post-attendee-page-youtube,Post-Attendee Page Youtube"><img src="https://st1.zoom.us/static/94172/image/new/home/IconYoutube.png" alt="Youtube"></a>
                  </ul>
                  </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              </div>
            </div>
          </div>
          </div>
          </div>
        </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="able/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="able/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="able/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="able/assets/vendor/aos/aos.js"></script>
  <script src="able/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="able/assets/js/main.js"></script>
  <script src="able/assets/js/able.js"></script>
  <script src="jwt-decode.js"></script>

</body>
</html>
