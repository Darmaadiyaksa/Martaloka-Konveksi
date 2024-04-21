<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-9">
  <title>Martaloka | @yield('title-head')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('web-assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/custom-animate.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/imp.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/jquery.bootstrap-touchspin.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/rtl.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/swiper.min.css') }}">

  <!-- Module css -->
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/header-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/banner-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/about-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/blog-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/fact-counter-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/faq-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/contact-page.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/breadcrumb-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/team-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/partner-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/testimonial-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/services-section.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/module-css/footer-section.css') }}">

  <link rel="stylesheet" href="{{ asset('web-assets/css/color/theme-color.css') }}" id="jssDefault">
  <link rel="stylesheet" href="{{ asset('web-assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('web-assets/css/responsive.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/pnotify/pnotify.custom.min.css') }}">
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/images/icon-logo.png') }}" type="image/x-icon">

  @yield('page-css')
</head>
@php
  $profil = App\Models\Profil::first();
@endphp
<body>
  <div class="boxed_wrapper ltr">
    <!-- preloader -->
    <div class="loader-wrap">
      <div class="preloader">
        <div class="preloader-close">M</div>
        <div id="handle-preloader" class="handle-preloader">
          <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
              <span data-text-preloader="m" class="letters-loading">m</span>
              <span data-text-preloader="a" class="letters-loading">a</span>
              <span data-text-preloader="r" class="letters-loading">r</span>
              <span data-text-preloader="t" class="letters-loading">t</span>
              <span data-text-preloader="a" class="letters-loading">a</span>
              <span data-text-preloader="l" class="letters-loading">l</span>
              <span data-text-preloader="o" class="letters-loading">o</span>
              <span data-text-preloader="k" class="letters-loading">k</span>
              <span data-text-preloader="a" class="letters-loading">a</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main header-->
    <header class="main-header header-style-one">

      <!--Start Header Top-->
      <div class="header-top">
        <div class="auto-container">
          <div class="outer-box">
            <div class="header-top-left">
              <div class="social-link-box-style1">
                <div class="icon">
                  <span class="icon-share"></span>
                </div>
                  <p>Follow</p>
                  <ul class="clearfix">
                    <li>
                      <a href="{{$profil->facebook}}" target="_blank"><i class="icon-facebook-app-symbol"></i></a>
                    </li>
                    <li>
                      <a href="{{$profil->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="{{$profil->youtube}}" target="_blank"><i class="icon-youtube"></i></a>
                    </li>
                  </ul>
              </div>
            </div>

            <div class="header-top-right">
              <div class="quick-link-box">
                <div class="link-box">
                  <ul>
                    <li><a href="#">Register</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Header Top-->

      <!--Start Header-->
      <div class="header">
        <div class="auto-container">
          <div class="outer-box">
            <div class="header-left"></div>
            <div class="header-middle">
              <div class="main-logo-box">
                <a href="{{route('welcome')}}">
                  <img style="height: 70px" src="{{asset('assets/images/logoo2.png')}}" alt="Aska Logo" title="">
                </a>
              </div>
              <div class="nav-outer style1 clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <div class="inner">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                </div>
                <!-- Main Menu -->
                <nav class="main-menu style1 navbar-expand-md navbar-light">
                  <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                    <ul class="navigation clearfix">
                      <li class="{{ Request::is('/') ? 'current' : '' }}">
                        <a href="{{route('welcome')}}">Beranda</a>
                      </li>
                      <li class="dropdown {{ Request::is('profil/*') ? 'current' : '' }}"><a href="#">Profil</a>
                        <ul>
                          <li class="{{ Request::is('profil/tentangkami') ? 'current' : '' }}"><a href="{{route('profil.tentangkami')}}">Tentang Kami</a></li>
                          <li class="{{ Request::is('profil/sejarah') ? 'current' : '' }}"><a href="{{route('profil.sejarah')}}">Sejarah</a></li>
                          <li class="{{ Request::is('profil/program') ? 'current' : '' }}"><a href="{{route('profil.program')}}">Program</a></li>
                          <li class="{{ Request::is('profil/galeri') ? 'current' : '' }}"><a href="{{route('profil.galeri')}}">Galeri</a></li>
                        </ul>
                      </li>
                      <li class="{{ Request::is('pendaftaran*') ? 'current' : '' }}"><a href="{{route('pendaftaran-daftar')}}">Pendaftaran</a></li>
                      </li>
                      <li class="blank-box"></li>
                      <li class="{{ Request::is('informasi*') ? 'current' : '' }}"><a href="{{route('informasi')}}">Informasi</a>
                      <li class="# search-toggler"><a href="javascript:void(0);"><i class="icon-zoom mr-2"></i> Pencarian</a></li>
                      <li class="#"><a href="{{ route('login') }}"><i class="icon-account mr-2"></i> Login</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
            <div class="header-right"></div>
          </div>
        </div>
      </div>

      <div class="sticky-header">
        <div class="container">
          <div class="sticky-header__inner clearfix">
            <!--Logo-->
            <div class="logo float-left">
              <a href="index.html" class="img-responsive">
                <img style="margin-top: -10px;" src="{{asset('assets/images/logo1.png')}}" alt="ASKA Logo" title="">
              </a>
            </div>
            <div class="right-col float-right">
              <nav class="main-menu clearfix"></nav>
            </div>
          </div>
        </div>
      </div>

      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
        <nav class="menu-box">
          <div class="nav-logo">
            <a href="index.html">
              <img src="assets/images/resources/mobilemenu-logo.png" alt="" title="">
            </a>
          </div>
          <div class="menu-outer"></div>
          <div class="social-links">
            <ul class="clearfix">
              <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
              <li><a href="#"><span class="fab fa fa-instagram"></span></a></li>
              <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    @yield('content')


    <div class="bottom-parallax">
      <footer class="footer-area">
        <div class="footer">
          <div class="container">
            <div class="row text-right-rtl">
              <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <div class="single-footer-widget marbtm50">
                  <div class="title">
                    <div class="dotted"></div>
                    <h3>Martaloka</h3>
                  </div>
                  <div class="our-company-info">
                    <div class="text-box">
                      <p>Lembaga pelatihan kerja mandiri di bawah naungan Yayasan Adhimukti Sastra Kawiswara Acarya dan sudah terakreditasi.</p>
                    </div>
                    <ul>
                      <li>
                        <div class="icon">
                          <span class="icon-map"></span>
                        </div>
                        <div class="text">
                          <a href="#">Lokasi</a>
                        </div>
                      </li>
                      <li>
                        <div class="icon">
                          <span class="icon-chat"></span>
                        </div>
                        <div class="text">
                          <a href="contact.html">Kontak</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget single-footer-widget--link-box">
                  <div class="title">
                    <div class="dotted"></div>
                    <h3>Media Sosial</h3>
                  </div>
                  <div class="footer-widget-links">
                    <ul>
                      <li>
                        <a href="{{$profil->facebook}}" target="_blank">
                          <span class="fa fa-facebook-square"></span>Facebook
                        </a>
                      </li>
                      <li>
                        <a href="{{$profil->instagram}}" target="_blank">
                          <span class="fa fa-instagram"></span>Instagram
                        </a>
                      </li>
                      <li>
                        <a href="{{$profil->youtube}}" target="_blank">
                          <span class="fa fa-youtube-play"></span>Youtube
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget pdtop50">
                  <div class="title">
                    <div class="dotted"></div>
                    <h3>Kontak Kami</h3>
                  </div>
                  <div class="footer-widget-contact-info">
                    <p>Kantor Pusat<br>{{$profil->alamat}}</p>
                    <ul>
                      <li><a href="tel:{{$profil->telp}}">{{$profil->telp}}</a></li>
                      <li><a href="mailto:{{$profil->email}}">{{$profil->email}}</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <div class="container">
            <div class="bottom-inner">
              <div class="copyright">
                <p>&copy; 2024 <a href="{{route('welcome')}}">Martaloka</a></p>
              </div>
              <div class="footer-logo-style1">
                <a href="{{route('welcome')}}">
                  <img style="height: 70px; margin-top:-20px;" src="{{asset('assets/images/logoo2.png')}}" alt="ASKA Logo" title="">
                </a>
              </div>
              <div class="footer-menu">
                <ul>
                  <li><a href="http://patrasdev.co.id" target="_blank">Patras Dev</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </footer>
    </div>

    <button class="scroll-top scroll-to-target" data-target="html">
      <span class="icon-top"></span>
    </button>

    <div id="search-popup" class="search-popup">
      <div class="close-search"><i class="icon-close"></i></div>
      <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
          <form method="post" action="https://st.ourhtmldemo.com/new/educamb/index.html">
            <div class="form-group">
              <fieldset>
                <input type="search" class="form-control" name="search-input" value="" placeholder="Kata Kunci" required>
                <input type="submit" value="Cari" class="theme-btn style-four">
              </fieldset>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <script src="{{ asset('web-assets/js/jquery.js') }}"></script>
  <script src="{{ asset('web-assets/js/aos.js') }}"></script>
  <script src="{{ asset('web-assets/js/appear.js') }}"></script>
  <script src="{{ asset('web-assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/isotope.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.bootstrap-touchspin.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.countTo.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.event.move.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.fancybox.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery.paroller.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/jquery-sidebar-content.js') }}"></script>
  <script src="{{ asset('web-assets/js/knob.js') }}"></script>
  <script src="{{ asset('web-assets/js/map-script.js') }}"></script>
  <script src="{{ asset('web-assets/js/owl.js') }}"></script>
  <script src="{{ asset('web-assets/js/pagenav.js') }}"></script>
  <script src="{{ asset('web-assets/js/scrollbar.js') }}"></script>
  <script src="{{ asset('web-assets/js/swiper.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/tilt.jquery.js') }}"></script>
  <script src="{{ asset('web-assets/js/TweenMax.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/validation.js') }}"></script>
  <script src="{{ asset('web-assets/js/wow.js') }}"></script>

  <script src="{{ asset('web-assets/js/jquery-1color-switcher.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/parallax.min.js') }}"></script>
  <script src="{{ asset('web-assets/js/skrollr.min.js') }}"></script>
  <script src="{{ asset('assets/pnotify/pnotify.custom.min.js') }}"></script>

  <!-- thm custom script -->
  <script src="{{ asset('web-assets/js/custom.js') }}"></script>

  <script>
    function notifikasi(notif) {
          new PNotify({
              title: notif.title,
              text: notif.text,
              type: notif.type,
              desktop: {
                  desktop: true
              }
          }).get().click(function(e) {
              if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e
                      .target)) return;
          });
      }

      if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
          notifikasi({!! session('notif') !!});
      }
  </script>

  @yield('page-js')
</body>