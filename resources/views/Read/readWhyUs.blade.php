<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Rumah Makan Putri Jaya</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('tamp/assets/img/favicon.png') }}" rel="icon"> {{-- icon tap browswer --}}
  <link href="{{ asset('tamp/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Satisfy:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('tamp/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('tamp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('tamp/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('tamp/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('tamp/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('tamp/assets/css/seccond.css') }}" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-end justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          {{-- <i class="bi bi-phone d-flex align-items-center d-none d-lg-block"><span>+1 5589 55488 55</span></i>
          <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i> --}}
          @if ($informasi)
              <i class="bi bi-phone d-flex align-items-center d-none d-lg-block">
                <span>{{ $informasi->formatted_contact }}</span>
              </i>
            
              <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center">
                  <span>{{ $hariIni }}: {{ $jamBukaTutup }}</span>
              </i>
          @endif
        </div>
        <a href="#book-a-table" class="cta-btn">Booka a table</a>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('halhome') }}" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          @if($informasi)
          <h1 class="sitename">{{ $informasi->nama_rumah_makan ?? 'Nama Rumah Makan Tidak Tersedia' }}</h1>          @endif
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('halhome') }}#hero">Home</a></li>
            <li><a href="{{ route('halhome') }}#about">About</a></li>
            <li><a href="{{ route('halhome') }}#menu">Menu</a></li>
            <li><a href="{{ route('halhome') }}#specials">Specials</a></li>
            <li><a href="{{ route('halhome') }}#events">Events</a></li>
            <li><a href="{{ route('halhome') }}#chefs">Chefs</a></li>
            <li><a href="{{ route('halhome') }}#gallery">Gallery</a></li>
            <li class="dropdown"><a href="#"><span>Halamana Lain</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#" class="active">Why Us</a></li>
                <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="#">Event Khusus</a></li>
                    <li><a href="#">Acara</a></li>
                  </ul>
                </li>
                <li><a href="#">Rating</a></li>
              </ul>
            </li>
            <li><a href="{{ route('halhome') }}#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <style>
      .atas img {
        width: 100%;
        height: 10rem;
        object-fit: cover; /* biar tetap bagus bentuknya */
      }
    </style>
    
    <div class="atas">
      <img src="{{ asset('tamp/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="Gambar memanjang">
    </div>


    <section id="why-us" class="why-us section">

      <div class="container" data-aos="fade-up">
    
        <!-- Judul Bertingkat -->
        <div class="section-title text-center">
          <h2>Why choose</h2>
          <span class="description-title">Our Restaurant</span>
        </div>
    
        <div class="row gy-4 justify-content-center">
          @foreach($WhyUs as $key => $whyitem)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
              <div class="card-item">
                <div class="simple-number">{{ $key + 1 }}</div>
                <h4>{{ $whyitem->title }}</h4>
                <p>{{ $whyitem->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
        
    
      </div>
    
    </section>
    
    


  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            @if($informasi)
              <p>{{ $informasi->alamat }}</p>
            @endif
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              @if($informasi)
                <p>{{ $informasi->formatted_contact }}</p>
              @endif
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
              <h4>Opening Hours</h4>
              <p>
                  @if(isset($groupedJam) && count($groupedJam) > 0)
                      @foreach($groupedJam as $group)
                          <strong>{{ $group['hari'] }}:</strong> 
                          <span>{{ $group['jam'] }}</span><br>
                      @endforeach
                  @else
                      <p>Jam operasional belum tersedia.</p>
                  @endif
              </p>
          </div>
      </div>
      

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Delicious</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('tamp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('tamp/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('tamp/assets/js/main.js') }}"></script>

</body>

</html>