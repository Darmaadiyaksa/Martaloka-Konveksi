@extends('layouts.master')

@section('title-head', 'Tentang Kami')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-4.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Tentang Kami</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="active">Program</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!--Start About Style1 Area-->
   <section class="about-style1-area">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Siapa Kami?</h2>
            <div class="sub-title">
                <p class="text-justify">LPK ASKA BALI merupakan salah satu Lembaga Pelatihan Kerja Magang ke Jepang. Kami melayani pelatihan, peningkatan skill, pengenalan lingkungan kerja dan lainnya. LPK juga menyediakan pelayanan berupa pelatihan bahasa asing, informasi lowongan kerja serta penyaluran tenaga kerja.</br></br>Kami memulai bisnis pada tahun 2020 yang dipimpin oleh I Nyoman Wijana. Bernaung dibawah Yayasan Adhimukti Sastra Kawiswara Acarya ter-akreditasi dengan ijin SO : 2/1034/HK 12/V/2021 , NIB : 022010074734, Izin Wilayah: 560/667/DPTK, dan nomor AHU-0009994.AH.01.04 Tahun 2020. LPK ASKA BALI tersebar di beberapa pulau, termasuk Pulau Bali dan Pulau Jawa.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="about-style1__inner">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about-style1-content">
                                <div class="top">
                                    <div class="big-text">E</div>
                                    <div class="text">
                                        <p>ducamb welcomed every pain avoided but in certain circumstances owing
                                            to the claims of the obligations of business it will frequently
                                            occurs that pleasures.</p>
                                    </div>
                                </div>
                                <div class="bottom-text">
                                    <p>Certain circumstances owing to claims duty obligation that
                                        off business it will frequently occurs in our free hours when our power
                                        of choice is nothing prevents.</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Leadership</span>
                                    </a>
                                </div>
                                <div class="accreditations-logo">
                                    <div class="inner-tile">
                                        <h3>Our Accreditations</h3>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="single-accreditations-logo">
                                                <img src="({{asset('web-assets/images/resources/accreditations-logo-1.png')}})"
                                                    alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-accreditations-logo">
                                                <img src="({{asset('web-assets/images/resources/accreditations-logo-2.png')}})"
                                                    alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-accreditations-logo">
                                                <img src="({{asset('web-assets/images/resources/accreditations-logo-3.png')}})"
                                                    alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-accreditations-logo">
                                                <img src="({{asset('web-assets/images/resources/accreditations-logo-4.png')}})"
                                                    alt="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="about-style1-img-box">
                                <div class="inner">
                                    <img src="({{asset('web-assets/images/about/about-style1__image-1.jpg')}})" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Style1 Area-->

    <!--Start Statements style2 Area-->
    <section class="statements-style2-area">
        <div class="statements-area-bg"
            style="background-image: url({{asset('web-assets/images/resources/statements-area-bg.jpg')}});"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="statements-tab">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="tabs-content-box">

                                    <!--Tab-->
                                    <div class="tab-content-box-item tab-content-box-item-active" id="mission">
                                        <div class="statements-tab__content">
                                            <div class="theme_carousel statements-tab-carousel owl-theme owl-carousel owl-nav-style-one"
                                                data-options='{
                                                    "loop": true, 
                                                    "margin": 0, 
                                                    "autoheight":true, 
                                                    "lazyload":true, 
                                                    "nav": true, 
                                                    "dots": false, 
                                                    "autoplay": true, 
                                                    "autoplayTimeout": 5000, 
                                                    "smartSpeed": 500, 
                                                    "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                                    "<span class=\"right icon-right-arrow-1\"></span>"], 
                                                    "responsive":{ 
                                                    "0" :{ "items": "1" }, 
                                                    "600" :{ "items" : "1" }, 
                                                    "768" :{ "items" : "1" }, 
                                                    "992":{ "items" : "1" }, 
                                                    "1200":{ "items" : "1" }
                                                }
                                                }'>

                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Mission Statement</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-target"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->
                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Mission Statement</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-target"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->

                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab-content-box-item" id="vision">
                                        <div class="statements-tab__content">
                                            <div class="theme_carousel statements-tab-carousel owl-theme owl-carousel owl-nav-style-one"
                                                data-options='{
                                                    "loop": true, 
                                                    "margin": 0, 
                                                    "autoheight":true, 
                                                    "lazyload":true, 
                                                    "nav": true, 
                                                    "dots": false, 
                                                    "autoplay": true, 
                                                    "autoplayTimeout": 5000, 
                                                    "smartSpeed": 500, 
                                                    "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                                    "<span class=\"right icon-right-arrow-1\"></span>"], 
                                                    "responsive":{ 
                                                    "0" :{ "items": "1" }, 
                                                    "600" :{ "items" : "1" }, 
                                                    "768" :{ "items" : "1" }, 
                                                    "992":{ "items" : "1" }, 
                                                    "1200":{ "items" : "1" }
                                                }
                                                }'>

                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Vision Statement</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-infinite"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->
                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Vision Statement</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-infinite"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->

                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab-content-box-item" id="values">
                                        <div class="statements-tab__content">
                                            <div class="theme_carousel statements-tab-carousel owl-theme owl-carousel owl-nav-style-one"
                                                data-options='{
                                                    "loop": true, 
                                                    "margin": 0, 
                                                    "autoheight":true, 
                                                    "lazyload":true, 
                                                    "nav": true, 
                                                    "dots": false, 
                                                    "autoplay": true, 
                                                    "autoplayTimeout": 5000, 
                                                    "smartSpeed": 500, 
                                                    "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                                    "<span class=\"right icon-right-arrow-1\"></span>"], 
                                                    "responsive":{ 
                                                    "0" :{ "items": "1" }, 
                                                    "600" :{ "items" : "1" }, 
                                                    "768" :{ "items" : "1" }, 
                                                    "992":{ "items" : "1" }, 
                                                    "1200":{ "items" : "1" }
                                                }
                                                }'>

                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Our Values</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-diploma-1"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->
                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Our Values</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-diploma-1"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->

                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab-content-box-item" id="sustainability">
                                        <div class="statements-tab__content">
                                            <div class="theme_carousel statements-tab-carousel owl-theme owl-carousel owl-nav-style-one"
                                                data-options='{
                                                    "loop": true, 
                                                    "margin": 0, 
                                                    "autoheight":true, 
                                                    "lazyload":true, 
                                                    "nav": true, 
                                                    "dots": false, 
                                                    "autoplay": true, 
                                                    "autoplayTimeout": 5000, 
                                                    "smartSpeed": 500, 
                                                    "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                                    "<span class=\"right icon-right-arrow-1\"></span>"], 
                                                    "responsive":{ 
                                                    "0" :{ "items": "1" }, 
                                                    "600" :{ "items" : "1" }, 
                                                    "768" :{ "items" : "1" }, 
                                                    "992":{ "items" : "1" }, 
                                                    "1200":{ "items" : "1" }
                                                }
                                                }'>

                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Sustainability</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-navigation"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->
                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="#">Sustainability</a></h3>
                                                        <p>Cannot forese the pain trouble that are
                                                            bound to ensue & equal blame belongs
                                                            too those who fail in their duty through
                                                            weakness of will.</p>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="icon-navigation"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="statements-tab__button">
                                    <ul class="tabs-button-box clearfix">
                                        <li data-tab="#mission" class="tab-btn-item active-btn-item">
                                            <h3>Mission Statement</h3>
                                        </li>
                                        <li data-tab="#vision" class="tab-btn-item">
                                            <h3>Vision Statement</h3>
                                        </li>
                                        <li data-tab="#values" class="tab-btn-item">
                                            <h3>Our Values</h3>
                                        </li>
                                        <li data-tab="#sustainability" class="tab-btn-item">
                                            <h3>Sustainability</h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Statements Style2 Area-->

    <!--Start Choose Style1 Area-->
    <section class="choose-style1-area">
        <div class="container">
            <div class="sec-title">
                <h2>Mengapa Memilih Aska Bali</h2>
                <div class="sub-title">
                    <p>Yuk Magang ke Jepang Bersama Kami!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="choose-style1-content">
                        <div class="theme_carousel choose-style1-carousel owl-theme owl-carousel owl-nav-style-one"
                            data-options='{
                                "loop": true, 
                                "margin": 30, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": true, 
                                "dots": false, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "2" }, 
                                "992":{ "items" : "3" }, 
                                "1200":{ "items" : "4" }
                            }
                            }'>

                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/teacher_11802895.png')}}"  alt="">
                                    </div>
                                    
                                    
                                    <div class="inner-title">
                                        <h3>Pengajar Dari Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Pelajaran Bahasa Jepang yang praktis dipandu olehleft guru yang berasal dari Jepang.
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-1.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/social-responsibility_12316660.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Dukungan Penuh di Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Setelah tiba di Jepang, kami memberikan dukungan menyeluruh melalui sistem yang 
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-2.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width:30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/japan_6259275.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Tersebar Diseluruh Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Kompatibel dengan semua industri dan profesi yang memenuhi syarat untuk pelatihan teknis.
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-3.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/teamwork_9195479.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Retensi Tinggi</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Sebelum Anda ke Jepang, kami melakukan proses wawancara untuk mengeliminasi para peserta pelatihan
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-4.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->

                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/teacher_11802895.png')}}"  alt="">
                                    </div>
                                    
                                    
                                    <div class="inner-title">
                                        <h3>Pengajar Dari Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Pelajaran Bahasa Jepang yang praktis dipandu oleh guru yang berasal dari Jepang.
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-1.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/social-responsibility_12316660.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Dukungan Penuh di Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Setelah tiba di Jepang, kami memberikan dukungan menyeluruh melalui sistem yang 
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-2.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width:30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/japan_6259275.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Tersebar Diseluruh Jepang</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Kompatibel dengan semua industri dan profesi yang memenuhi syarat untuk pelatihan teknis.
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-3.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon" style="width: 30%">
                                        {{-- <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span> --}}
                                        <img src="{{asset('web-assets/images/icon/teamwork_9195479.png')}}" alt="">
                                    </div>
                                    <div class="inner-title">
                                        <h3>Retensi Tinggi</h3>
                                    </div>
                                    <div class="text">
                                        <p class="text-left">Sebelum Anda ke Jepang, kami melakukan proses wawancara untuk mengeliminasi para peserta pelatihan
                                        </p>
                                    </div>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="{{route('welcome')}}#pilihAska">
                                            <span class="txt">Selengkapnya</span>
                                        </a>
                                    </div>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url({{asset('web-assets/images/resources/choose-style-1-img-4.jpg')}});">
                                        <div class="btns-box">
                                            <a class="btn-one" href="{{route('welcome')}}#pilihAska">
                                                <span class="txt">Selengkapnya</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Choose Style1 Area-->

    <!--Start Fact Counter Area-->
    <section class="fact-counter-area">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Most Interesting Facts</h2>
                <div class="sub-title">
                    <p>To take a trivial example which of us ever undertakes laborious physical exercise.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="fact-counter-box">
                        <!--Start Single Fact Counter-->
                        <li class="single-fact-counter">
                            <div class="title-holder">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="2500">0</span>
                                </div>
                                <h3>History of High Achievers</h3>
                            </div>
                            <div class="icon-holder">
                                <span class="icon-online"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span><span
                                        class="path8"></span><span class="path9"></span><span
                                        class="path10"></span><span class="path11"></span><span
                                        class="path12"></span><span class="path13"></span><span
                                        class="path14"></span><span class="path15"></span><span
                                        class="path16"></span><span class="path17"></span></span>
                            </div>
                        </li>
                        <!--End Single Fact Counter-->
                        <!--Start Single Fact Counter-->
                        <li class="single-fact-counter single-fact-counter--style2">
                            <div class="title-holder">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="1870">0</span>
                                </div>
                                <h3>Total Acres of the Land</h3>
                            </div>
                            <div class="icon-holder">
                                <span class="icon-office-building"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span><span
                                        class="path8"></span><span class="path9"></span><span
                                        class="path10"></span><span class="path11"></span><span
                                        class="path12"></span><span class="path13"></span><span
                                        class="path14"></span><span class="path15"></span><span
                                        class="path16"></span><span class="path17"></span><span
                                        class="path18"></span><span class="path19"></span><span
                                        class="path20"></span><span class="path21"></span><span
                                        class="path22"></span><span class="path23"></span><span
                                        class="path24"></span><span class="path25"></span><span
                                        class="path26"></span><span class="path27"></span><span
                                        class="path28"></span><span class="path29"></span><span
                                        class="path30"></span><span class="path31"></span><span
                                        class="path32"></span><span class="path33"></span><span
                                        class="path34"></span><span class="path35"></span><span
                                        class="path36"></span><span class="path37"></span><span
                                        class="path38"></span><span class="path39"></span><span
                                        class="path40"></span><span class="path41"></span><span
                                        class="path42"></span><span class="path43"></span><span
                                        class="path44"></span><span class="path45"></span><span
                                        class="path46"></span><span class="path47"></span><span
                                        class="path48"></span><span class="path49"></span><span
                                        class="path50"></span><span class="path51"></span><span
                                        class="path52"></span><span class="path53"></span><span
                                        class="path54"></span><span class="path55"></span><span
                                        class="path56"></span><span class="path57"></span><span
                                        class="path58"></span><span class="path59"></span><span
                                        class="path60"></span><span class="path61"></span><span
                                        class="path62"></span><span class="path63"></span></span>
                            </div>
                        </li>
                        <!--End Single Fact Counter-->
                    </ul>

                    <ul class="fact-counter-box bottom">
                        <!--Start Single Fact Counter-->
                        <li class="single-fact-counter pdt50 pdb0">
                            <div class="title-holder">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="3.9">0</span>
                                </div>
                                <h3>Kilometres of Bookshelves</h3>
                            </div>
                            <div class="icon-holder">
                                <span class="icon-book"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span><span
                                        class="path5"></span><span class="path6"></span><span
                                        class="path7"></span><span class="path8"></span><span
                                        class="path9"></span><span class="path10"></span><span
                                        class="path11"></span><span class="path12"></span><span
                                        class="path13"></span><span class="path14"></span><span
                                        class="path15"></span><span class="path16"></span><span
                                        class="path17"></span><span class="path18"></span><span
                                        class="path19"></span><span class="path20"></span><span
                                        class="path21"></span><span class="path22"></span><span
                                        class="path23"></span><span class="path24"></span><span
                                        class="path25"></span><span class="path26"></span><span
                                        class="path27"></span><span class="path28"></span><span
                                        class="path29"></span><span class="path30"></span><span
                                        class="path31"></span><span class="path32"></span><span
                                        class="path33"></span><span class="path34"></span></span>
                            </div>
                        </li>
                        <!--End Single Fact Counter-->
                        <!--Start Single Fact Counter-->
                        <li class="single-fact-counter single-fact-counter--style2 pdt50 pdb0">
                            <div class="title-holder">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="164">0</span>
                                </div>
                                <h3>Awards & Achivements</h3>
                            </div>
                            <div class="icon-holder">
                                <span class="icon-browser"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span><span
                                        class="path8"></span><span class="path9"></span><span
                                        class="path10"></span><span class="path11"></span><span
                                        class="path12"></span><span class="path13"></span><span
                                        class="path14"></span><span class="path15"></span><span
                                        class="path16"></span><span class="path17"></span><span
                                        class="path18"></span><span class="path19"></span><span
                                        class="path20"></span><span class="path21"></span><span
                                        class="path22"></span><span class="path23"></span></span>
                            </div>
                        </li>
                        <!--End Single Fact Counter-->
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!--End Fact Counter Area-->

    <!--Start Team Style1 Area-->
    <section class="team-style1-area" id="section3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="team-style1__top">
                        <div class="sec-title">
                            <h2>Our Management Team</h2>
                            <div class="sub-title">
                                <p>
                                    Trouble that are bound to ensue and equal blame belongs to those who fail.
                                </p>
                            </div>
                        </div>
                        <div class="btns-box">
                            <a class="btn-one btn-one--style2" href="team.html">
                                <span class="txt">All Members</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!--Start Single Team Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-team-style1 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <div class="inner">
                                <img src="({{asset('web-assets/images/team/team-v1-1.jpg')}})" alt="" />
                                <div class="share-button">
                                    <div class="icon">
                                        <span class="icon-share-1"></span>
                                    </div>
                                    <ul class="social-links">
                                        <li><a href="#"><i class="icon-twitter-1"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook-app-symbol"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Ian Hudson</a> <sup><span>*</span>Chancellor</sup></h3>
                            <div class="text">
                                <p>Loves or pursues desires to obtain pain itself
                                    because it is pain occasionally.</p>
                            </div>
                            <div class="mail-info">
                                <div class="icon">
                                    <span class="icon-send"></span>
                                </div>
                                <a href="mailto:yourmail@email.com">hutson@educamb.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Team Style1-->

                <!--Start Single Team Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-team-style1 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <div class="inner">
                                <img src="({{asset('web-assets/images/team/team-v1-2.jpg')}})" alt="" />
                                <div class="share-button">
                                    <div class="icon">
                                        <span class="icon-share-1"></span>
                                    </div>
                                    <ul class="social-links">
                                        <li><a href="#"><i class="icon-twitter-1"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook-app-symbol"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Lillian Stella</a> <sup><span>*</span>Vice Chancellor</sup></h3>
                            <div class="text">
                                <p>To take a trivial example which off undertakes laborious physical exercise.</p>
                            </div>
                            <div class="mail-info">
                                <div class="icon">
                                    <span class="icon-send"></span>
                                </div>
                                <a href="mailto:yourmail@email.com">stella@educamb.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Team Style1-->

                <!--Start Single Team Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-team-style1 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <div class="inner">
                                <img src="assets/images/team/team-v1-3.jpg" alt="" />
                                <div class="share-button">
                                    <div class="icon">
                                        <span class="icon-share-1"></span>
                                    </div>
                                    <ul class="social-links">
                                        <li><a href="#"><i class="icon-twitter-1"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook-app-symbol"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Luis Kaiden</a> <sup><span>*</span>President</sup></h3>
                            <div class="text">
                                <p>Right to find fault with a man who chooses to
                                    that has no annoying consequences.</p>
                            </div>
                            <div class="mail-info">
                                <div class="icon">
                                    <span class="icon-send"></span>
                                </div>
                                <a href="mailto:yourmail@email.com">kaiden@educamb.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Team Style1-->

            </div>
        </div>
    </section>
    <!--End Team Style1 Area-->

    <!--Start Video Gallery Style1 Area-->
    <section class="video-gallery-style1-area">
        <div class="video-gallery-style1-area__bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel video-gallery-carousel owl-theme owl-carousel owl-dot-style1"
                        data-options='{
                                "loop": true, 
                                "margin": 30, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": false, 
                                "dots": true, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "1" }, 
                                "992":{ "items" : "2" }, 
                                "1200":{ "items" : "2" }
                            }
                        }'>

                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Emma Amelia</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-1.jpg')}})" alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->

                        
                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Wiliam Theo</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-2.jpg')}})" alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->

                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Emma Amelia</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-1.jpg')}})"alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->
                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Wiliam Theo</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-2.jpg')}})" alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->

                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Emma Amelia</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-1.jpg')}})" alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->
                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Journey of Wiliam Theo</h3>
                                </div>
                                <div class="share-button">
                                    <a href="#">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="({{asset('web-assets/images/resources/video-gallery-style1-img-2.jpg')}})" alt="">
                            </div>
                            <div class="bottom">
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="reload-btn">
                                    <a href="#">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Gallery Style1 Area-->

 @endsection

@section('page-js')
<script>

</script>
@endsection
