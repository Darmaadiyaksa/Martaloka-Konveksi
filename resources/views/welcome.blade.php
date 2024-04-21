@extends('layouts.master')

@section('title-head', 'Beranda')

@section('content')
<section class="main-slider style1 nav-style2">
  <div class="slider-box">
      <!-- Banner Carousel -->
      <div class="banner-carousel owl-theme owl-carousel">

          <!-- Slide -->
          <div class="slide">
              <div class="image-layer" style="background-image:url(web-assets/images/slider/1.jpg)">
              </div>
              <div class="auto-container">
                  <div class="content">
                      <div class="big-title">
                          <h2>Selamat Datang<br>di Martaloka Konveksi</h2>
                      </div>
                      <div class="text">
                          <p>Konveksi kami menawarkan solusi pembuatan berbagai pakaian</p>
                      </div>
                      <div class="btns-box">
                          <a class="btn-one" href="about.html">
                              <span class="txt">
                                  Pesan
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Slide -->
          <div class="slide">
              <div class="image-layer" style="background-image:url(web-assets/images/slider/4.jpg)">
              </div>
              <div class="auto-container">
                  <div class="content middle text-center">
                      <div class="big-title">
                          <h2>Kualitas Tak Tertandingi Harga Terjangkau</h2>
                      </div>
                      <div class="text">
                          <p>Mewujudkan Inspirasi Mode Andadengan Sentuhan Konveksi Profesional</p>
                      </div>
                      <div class="btns-box">
                          <a class="btn-one" href="about.html">
                              <span class="txt">
                                  Read More
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Slide -->
          <div class="slide">
              <div class="image-layer" style="background-image:url(web-assets/images/slider/5.jpg)">
              </div>
              <div class="auto-container">
                  <div class="content">
                      <div class="big-title">
                          <h2>Gaya Anda<br>Karya Kami</h2>
                      </div>
                      <div class="text">
                          <p>Tingkatkan Penampilan Anda dengan Pilihan yang Luar Biasa</p>
                      </div>
                      <div class="btns-box">
                          <a class="btn-one" href="about.html">
                              <span class="txt">
                                  Read More
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>


      </div>
  </div>
</section>

<section class="academics-overview-style1-area">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="academics-overview-style1-content">
                  <div class="academics-overview-style1-content__shape"
                      style="background-image: url(web-assets/images/slider/kaos.jpg);">
                  </div>
                  <div class="text-box">
                      <div class="sec-title">
                          <h2>Martaloka Konveksi</h2>
                      </div>
                      <div class="text">
                        <p class="text-justify">Martaloka konveksi hadir untuk membantu Anda dalam memiliki kaos terbaik untuk berbagai aktivitas dan kegiatan. Kami memproduksi berbagai jenis kaos seperti kaos event, kaos promosi perusahaan, kaos klub hobi, kaos fans, dan kaos partai dengan kualitas yang terjaga. Dengan melakukan seluruh proses produksi secara mandiri, kami dapat memotong biaya dan waktu sehingga konsumen kami dapat menerima manfaat layanan kami sebagai “Tangan Pertama Anda”. Dapatkan produk kaos berkualitas dengan harga yang hemat dan hemat waktu hanya di martaloka.co.id.</p>
                      </div>
                  </div>
                  <div class="academics-overview-style1-img-box"
                      style="background-image: url(web-assets/images/slider/5.jpg);">
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

  <section class="departments-area" id="pilihAska">
    <div class="container">
      <div class="sec-title text-center">
        <h2>Keunggulan Martaloka Konveksi</h2>
        <div class="sub-title">
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-3">
          <div class="single-departments-box marginbottom text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="icon">
              <img style="height: 85px;" src="{{asset('web-assets/images/icon/11.png')}}"  alt="">
            </div>
            <div class="">
             <h2>Spesialis Kaos</h2>
              <div class="text" >
                <p class="text-justify">Sudah lebih dari 5 tahun lamanya kami fokus di spesialis kaos. Dengan fokus pada produksi kaos, kami menghasilkan produk berkualitas tinggi yang dirancang khusus untuk kebutuhan Anda.</p>
              </div>
            </div>
          </div>
          <div class="single-departments-box text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="icon">
              <img style="height: 85px;" src="{{asset('web-assets/images/icon/13.png')}}" alt="">
            </div>
            <div class="">
              <h2>Tangan Pertama</h2>
              <div class="text">
                <p class="text-justify">Kami memproduksi kaos secara langsung, tanpa melalui perantara, sehingga menghasilkan produk yang berkualitas, harga terjangkau dan tepat waktu yang sesuai dengan keinginan Anda.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6">
          <div class="departments-img-box" style="background-image: url({{asset('web-assets/images/slider/olahraga.jpg')}}); background-size: cover; background-repeat: no-repeat; background-position: center;">
          </div>
        </div>

        <div class="col-xl-4 col-lg-3">
          <div class="single-departments-box marginbottom text-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="icon">
              <img style="height: 85px;" src="{{asset('web-assets/images/icon/12.png')}}" alt="">
            </div>
            <div class="">
              <h2>Kapasitas Besar</h2>
              <div class="text">
                <p class="text-justify">Dengan kapasitas produksi yang besar, yaitu mencapai 2.000 pcs per bulan, Pabrik Kaos kami mampu memenuhi pesanan dalam jumlah besar untuk wilayah Bali maupun luar Bali tanpa mengorbankan kualitas.</p>
              </div>
            </div>
          </div>

          <div class="single-departments-box text-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="icon">
              <img style="height: 85px;" src="{{asset('web-assets/images/icon/14.png')}}" alt="">
            </div>
            <div class="">
              <h2>Kualitas Terjamin</h2>
              <div class="text">
                <p class="text-justify">Kami hanya menggunakan bahan berkualitas tinggi dan team produksi handal dalam setiap tahap produksi, sehingga Anda dapat yakin bahwa kaos Anda akan bertahan lama dan tetap nyaman dipakai.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="top-categories-area">
    <div class="container">
        <div class="sec-title-style3 text-center">
            <div class="sub-title">
            </div>
            <h2 style="margin-top: -55px;" >Produk Kami</h2>
        </div>
    </div>
    <div class="container top-categories-area__content">
        <ul class="row">
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/kaos.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>76 Courses</p>
                            <h3><a href="#">Baju Kaos</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/polo.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>45 Courses</p>
                            <h3><a href="#">Baju Polo</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/kemeja.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>26 Courses</p>
                            <h3><a href="#">Kemeja</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
        </ul>

        <ul class="row border-top-box">
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/jaket.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>08 Courses</p>
                            <h3><a href="#">Jaket</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/kerja.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>19 Courses</p>
                            <h3><a href="#">Baju Kerja</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
            <!--Start Top Categories Single-->
            <li class="col-xl-4 col-lg-4 top-categories-single">
                <div class="top-categories-single__box">
                    <div class="img-box">
                        <div class="">
                            <img src="web-assets/images/slider/olahraga.jpg" alt="">
                        </div>
                        <div class="overlay-content">
                            <p>12 Courses</p>
                            <h3><a href="#">olahraga</a></h3>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="#">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        Read More
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End Top Categories Single-->
        </ul>
    </div>
</section>

<section class="academy-working-process-area">
  <div class="container">
      <div class="sec-title-style3 text-center">
          <div class="sub-title">
          </div>
          <h2 style="margin-top:-150px" >Cara Memesan</h2>
      </div>
      <div class="row">
          <div class="col-xl-12">
              <div class="academy-working-process__content-outer">
                  <div class="dotted-line">
                      <img src="web-assets/images/slider/garis.png" alt="">
                  </div>
                  <ul class="academy-working-process__content">
                      <li>
                          <div class="academy-working-process-single-box">
                              <div class="icon">
                                  <span class="icon-coder-1"></span>
                              </div>
                              <div class="title">
                                  <h6>Step 01</h6>
                                  <h3>Visit Our Page</h3>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="academy-working-process-single-box">
                              <div class="icon">
                                  <span class="icon-reading-1"></span>
                              </div>
                              <div class="title">
                                  <h6>Step 02</h6>
                                  <h3>Choose a Course</h3>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="academy-working-process-single-box">
                              <div class="icon">
                                  <span class="icon-credit-card-1"></span>
                              </div>
                              <div class="title">
                                  <h6>Step 03</h6>
                                  <h3>Make a Payment</h3>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="academy-working-process-single-box">
                              <div class="icon">
                                  <span class="icon-online-store-1"></span>
                              </div>
                              <div class="title">
                                  <h6>Step 04</h6>
                                  <h3>Learn a Course</h3>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="academy-working-process-single-box">
                              <div class="icon">
                                  <span class="icon-diploma-1"></span>
                              </div>
                              <div class="title">
                                  <h6>Step 06</h6>
                                  <h3>Get Certificate</h3>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="academy-slogan-area">
  <div class="academy-slogan-middle-content">
      <div class="academy-slogan-middle-content__bg"
          style="background-image: url(web-assets/images/slider/polo.jpg);"></div>
      <div class="banner-logo-box">
          <a href="index-3.html">
              <img style="margin-top: -30px" src="assets/images/logo1.png" alt="Awesome Logo" title="">
          </a>
      </div>
  </div>
  <div class="auto-container">
      <div class="row">
          <div class="col-xl-6">
              <div class="academy-slogan-content-one">
                  <div class="academy-slogan-content-one__bg"
                      style="background-image: url(web-assets/images/slider/5.jpg);">
                  </div>
                  <div class="academy-slogan-content-one__inner text-center">
                      <div class="sec-title-style3">
                          <div class="sub-title">
                          </div>
                          <h2><span>Kreasiakn Kaos Anda<br>di sini</span><br></h2>
                      </div>
                      <div class="btns-box">
                          <a class="btn-one btn-one--style4" href="about-3.html">
                              <span class="txt">
                                  <i class="icon-right-arrow-1"></i>
                                  Disain 
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-6">
              <div class="academy-slogan-content-one academy-slogan-content-one--style2">
                  <div class="academy-slogan-content-one__bg"
                      style="background-image: url(web-assets/images/slider/5.jpg);">
                  </div>
                  <div class="academy-slogan-content-one__inner text-center">
                      <div class="sec-title-style3">
                          <div class="sub-title">
                          </div>
                          <h2><span>Ayo Pesan jenis Pakean<br>Anda Sekarang</h2>
                      </div>
                      <div class="btns-box">
                          <a class="btn-one btn-one--style4" href="contact-3.html">
                              <span class="txt">
                                  <i class="icon-right-arrow-1"></i>
                                  Pesan
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>

<section class="partner-style2-area">
  <div class="container">
      <div class="sec-title-style3 text-center">
          <div class="sub-title">
          </div>
          <h2 style="margin-top: -20px" >TELAH DIPERCAYA OLEH :</h2>
      </div>

      <div class="row">
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/1.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/2.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/3.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/4.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/5.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
          <!--Start Single Partner Logo Box-->
          <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="single-partner-logo-box-style2">
                  <a href="#"><img src="web-assets/images/sponsor/6.png" alt="Awesome Image"></a>
              </div>
          </div>
          <!--End Single Partner Logo Box-->
      </div>
  </div>
</section>
@endsection
