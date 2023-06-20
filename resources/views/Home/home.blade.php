
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Web | Info Pemuda GIDI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/gidi.jpg" rel="icon">
  {{-- <link href="able/assets/img/logo_pemudagidi.png" rel="icon"> --}}
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
         <li><a class="navbar-brand" href="{{ url('/')}}" style="color: white;"> Beranda</a></li>
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
            <a href="{{url('login')}}">
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
                      <a href="/" class="img-bg d-flex align-items-end text-white" style="background-image: url('/image/{{ $carousel->image }}');">
                        <div class="img-bg-inner">
                            <h4><b> {{ $carousel->title}}</b></h4>
                            {!! $carousel->isi !!}
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
    <div class="row">
    <div class="col-12 mt-3 p-3">
        <div class="col-12">
            <div class="row">
            <div class="row">
                <div class="col-md">
                    <div class="header-body text-left mt-0 mb-4">
                        <div class="row justify-content">
                            <div class="row col-lg-12 col-md-4">
                                <div class="col-12">
                                <h4 style="text-align: center;" class="tex border-bottom">Data Statistik Pemuda GIDI</h4>
                                <br>
                                </div>
                                <div class="col-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-12 col-md-4 d-flex mt-md-0 mb-4" >
                        <div class="col-12 shadow-sm p-4 rounded" style="background-color: rgb(54, 157, 231)">
                            <div class="col-12 d-flex">

                                <div class="col-8">
                                    <span>JUMLAH ANGGOTA PEMUDA</span>
                                </div>
                                <div class="col-5 rounded  d-flex justify-content-end">
                                    <div class="rounded-circle bg-success d-flex align-items-center justify-content-center"
                                        style="width: 60px;height:60px;">
                                        <img id="jumlah_pemudagidi" src="able/assets/img/youth_gidi.png" alt="" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="fs-3 fw-bold">{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                        <div class="col-12 col-md-4 d-flex mt-md-0 mb-4" >
                        <div class="col-12 shadow-sm p-4 rounded" style="background-color: #81b1d8">
                            <div class="col-12 d-flex">
                                <div class="col-7">
                                    <span>JUMLAH LAKI LAKI</span>
                                </div>
                                <div class="col-5 rounded  d-flex justify-content-end">
                                    <div class="rounded-circle bg-info d-flex align-items-center justify-content-center"
                                        style="width: 60px;height:60px;">
                                        <img id="jumlah_pemudagidi" src="able/assets/img/boy_hansome.png" alt="" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <span class="fs-3 fw-bold">{{ $cownlakilaki }}</span>
                            </div>
                        </div>
                    </div>
                                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4" >
                        <div class="col-12 shadow-sm p-4 rounded" style="background-color: 	#b7e2f3">
                            <div class="col-12 d-flex">
                                <div class="col-8">
                                    <span>JUMLAH PEREMPUAN</span>
                                </div>
                                <div class="col-5 rounded  d-flex justify-content-end">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                        style="width: 60px;height:60px;">
                                        <img id="jumlah_pemudagidi" src="able/assets/img/women_beautiful.png" alt="" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="fs-3 fw-bold">{{ $cownperempuan }}</span>
                            </div>
                        </div>
                    </div>


    <!-- Informasi Terbaru -->
    <section id="blog" class="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="post-wrap">
             
    <h4>Informasi Terbaru</h4><hr>
    <div class="row">
      @foreach ($berita as $item)
        <div class="col-lg-6">
          <div class="card shadow" >
      <a href="/image/{{ $item->image }}"> 
        <img src="/image/{{ $item->image }}"  style="width:100%;" height="200px"  class="w3-hover-opacity" ></a>  
    <a href=""><h5>{{ $item->judul }}</h5> </a>   
        <p>{!! \Str::limit($item->isi,100) !!}</p>
        <br>
        <b style="font-family: initial">Tanggal: {{ $item->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
        <hr>
        </div>
        </div>
      @endforeach
      </div>
            

</center>
<!-- End Ucapkat Selmat Ulang tahun -->

<!-- Berita Duka -->


</div>
</div>
<!-- End Berita Terbaru -->

        <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- Trending Section   <div class="row"> -->

          <h5>Profil BPP Pemuda GIDI</h5>
          <hr>
        <div class="col-md-12 ">
          <div class="trending ">
          <div class="row">
          <div class="our-team ">
           
              
                @foreach ($profile as $item)
                <div class="pic">
                  <div class="col-lg-6">
                    <a href="/image/{{ $item->image }}">
                    <span class="logo-lg"><img src="/image/{{ $item->image }}" class="img-circle" alt="GIDI" style="width:300%;" height="900px" >
                    </a>
                    </div>
                </div>
                <br>
                  <b>{{ $item->nama }}</b>
                  <p>Ketua Departemen Pusat </p>
                @endforeach
                <br><br><br><br>
                @foreach ($profil as $item)
      
                <div class="pic">
                  <div class="col-lg-6">
                    <a href="/image/{{ $item->image }}">
                    <span class="logo-lg"><img src="/image/{{ $item->image }}" class="img-circle" alt="GIDI" style="width:300%;" height="900px">
                    </a>
                    </div>
                </div>
                <br>
                  <b>{{ $item->nama }}</b>
                  <p>Sekretaris Departemen Pusat</p>
                @endforeach
        </div>
        </div>
      </div><br>
      <h5>KALENDER</h5>
<hr>
    

      <!--- Calenderr -->
      <div id="idx-calendar">
        <div id="calendar-control">
         <div id="monthNow">Januari 2023</div>
         <div id="nextMonth"></div>
         <div id="prevMonth"></div>
        </div>
        <div id="dayNames">
         <ul>
          <li>Min</li>
          <li>Sen</li>
          <li>Sel</li>
          <li>Rab</li>
          <li>Kam</li>
          <li>Jum</li>
          <li>Sab</li>
         </ul>
        </div>
        <div id="daysNum">
        </div>
       </div>
      </div>
       <!---End Calenderr -->
        </div>
        </div>
    <div class="row">
      <!-- Ucapkan Selmat Ulang tahun -->
<h4>Ucapkan Selamat Ulang Tahun</h4><hr>
<div class="row mt-6" id="berita-terbaru">
  <div class="container">
      <div class="container">
        <div class="row">
      <marquee behavior="ula" direction="tahu"> <h4> Selamat ulang tahun  <br>   kepda seluruh pemuda yang berulang tahun dalam bulan ini, Tuhan Yesus Memberkati</h4></marquee>
          </div>
      </div>

      <div class="row">
        @foreach ($ulangtahun as $item)
          <div class="col-lg-4">
            <div class="card shadow" >
        <a href="/image/{{ $item->image }}"> 
          <img src="/image/{{ $item->image }}" alt="Norway" style="width:100%" height="200px" class="w3-hover-opacity" > </a>
         <b>{{ $item->nama }}</b>  <br><br> 
       <b style="font-family: initial">Tanggal: {{ $item->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
       <hr>
          </div> 
          </div>

        @endforeach
        </div>
  </div>
</div>
    </div>
        
        <div class="">
          <p><h4>Berita Duka</h4>
          <hr>
          <div class="entry-content">
           
            <div class="row">
             
          @foreach ($duka as $item)
            <div class="col-lg-4">
              <div class="card shadow" >
          <a href="/image/{{ $item->image }}"> 
            <img src="/image/{{ $item->image }}" alt="Norway" style="width:100%" height="200px" class="w3-hover-opacity" >
            <h5>{{ $item->judul }}</h5> 
          </a>  
            <p>{!! \Str::limit($item->isi, 100) !!}</p>
            <br><br>
           <b style="font-family: initial">Tanggal: {{ $item->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
          <hr>
              </div>
            </div>
          @endforeach
          <div>
          </div>
          </div>
          </div>
          </div>
       </div>
       </div>
       </div>
      </div>
     </div>
      </div>
  </main>
  </section>
  </main><!-- End #main -->

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
