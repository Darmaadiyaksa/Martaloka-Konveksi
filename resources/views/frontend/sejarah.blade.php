@extends('layouts.master')

@section('title-head', 'Sejarah')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-4.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Sejarah</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="active">Sejarah</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--start sejarah area 1 -->
  <section class="admission-style1-area">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-6">
                <div class="admission-style1-img-box">
                  <div class="admission-style1-img-box__bg" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});"></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="admission-style1-content-box">
                    <div class="admission-style1-content-box__inner">
                        <div class="sec-title">
                            <h2>Aska Bali</h2>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, pariatur repellendus quas nisi, eius delectus laudantium repudiandae, sequi illum quibusdam voluptate. Praesentium ea fugit odit doloremque quis reprehenderit nulla id!.</p>
                        </div>
                        {{-- <ul class="start-admission-box">
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Admission 2022</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Lateral Admision</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">International Students</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Fees Structures</a></h3>
                            </li>
                        </ul>

                        <div class="bottom-box">
                            <div class="icon">
                                <span class="icon-download"></span>
                            </div>
                            <div class="inner-title">
                                <h3>Undergraduates Prospects</h3>
                                <p><a href="#">Download.pdf</a></p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 order-22">
                <div class="admission-style1-content-box admission-style1-content-box--style2">
                    <div class="admission-style1-content-box__inner">
                        <div class="sec-title">
                            <h2>Postgraduate Students Admission</h2>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum aperiam officiis tenetur asperiores amet consequatur ab, assumenda blanditiis qui aliquid aliquam labore ex error ut repellat reiciendis id sequi et.</p>
                        </div>
                        {{-- <ul class="start-admission-box">
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Programs & Degrees</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">International Students</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Tuition & Fees</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Financial Aid</a></h3>
                            </li>
                        </ul>

                        <div class="bottom-box">
                            <div class="icon">
                                <span class="icon-download"></span>
                            </div>
                            <div class="inner-title">
                                <h3>Postgraduates Prospects</h3>
                                <p><a href="#">Download.pdf</a></p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="col-xl-6 order-11">
                <div class="admission-style1-img-box">
                    <div class="admission-style1-img-box__bg"
                        style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="admission-style1-img-box">
                  <div class="admission-style1-img-box__bg" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});"></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="admission-style1-content-box">
                    <div class="admission-style1-content-box__inner">
                        <div class="sec-title">
                            <h2>Aska Bali</h2>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, pariatur repellendus quas nisi, eius delectus laudantium repudiandae, sequi illum quibusdam voluptate. Praesentium ea fugit odit doloremque quis reprehenderit nulla id!.</p>
                        </div>
                        {{-- <ul class="start-admission-box">
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Admission 2022</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Lateral Admision</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">International Students</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Fees Structures</a></h3>
                            </li>
                        </ul>

                        <div class="bottom-box">
                            <div class="icon">
                                <span class="icon-download"></span>
                            </div>
                            <div class="inner-title">
                                <h3>Undergraduates Prospects</h3>
                                <p><a href="#">Download.pdf</a></p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 order-22">
                <div class="admission-style1-content-box admission-style1-content-box--style2">
                    <div class="admission-style1-content-box__inner">
                        <div class="sec-title">
                            <h2>Postgraduate Students Admission</h2>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum aperiam officiis tenetur asperiores amet consequatur ab, assumenda blanditiis qui aliquid aliquam labore ex error ut repellat reiciendis id sequi et.</p>
                        </div>
                        {{-- <ul class="start-admission-box">
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Programs & Degrees</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">International Students</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Tuition & Fees</a></h3>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-diagonal-arrow"></span>
                                </div>
                                <h3><a href="#">Financial Aid</a></h3>
                            </li>
                        </ul>

                        <div class="bottom-box">
                            <div class="icon">
                                <span class="icon-download"></span>
                            </div>
                            <div class="inner-title">
                                <h3>Postgraduates Prospects</h3>
                                <p><a href="#">Download.pdf</a></p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="col-xl-6 order-11">
                <div class="admission-style1-img-box">
                    <div class="admission-style1-img-box__bg"
                        style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--end sejarah Area 1 -->
  
  <section class="choose-style1-area">
    <div class="container">
        <div class="sec-title">
            <h2>Timeline Sejarah</h2>
            <div class="sub-title">
                <p>Trouble that are bound to ensue; and equal blame belongs to those who fail.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="choose-style1-content">
                    <div class="theme_carousel choose-style1-carousel owl-theme owl-carousel owl-nav-style-one owl-loaded owl-drag" data-options="{
                            &quot;loop&quot;: true, 
                            &quot;margin&quot;: 30, 
                            &quot;autoheight&quot;:true, 
                            &quot;lazyload&quot;:true, 
                            &quot;nav&quot;: true, 
                            &quot;dots&quot;: false, 
                            &quot;autoplay&quot;: true, 
                            &quot;autoplayTimeout&quot;: 5000, 
                            &quot;smartSpeed&quot;: 500, 
                            &quot;navText&quot;: [&quot;<span class=\&quot;left icon-right-arrow-1\&quot;></span>&quot;,
                            &quot;<span class=\&quot;right icon-right-arrow-1\&quot;></span>&quot;], 
                            &quot;responsive&quot;:{ 
                            &quot;0&quot; :{ &quot;items&quot;: &quot;1&quot; }, 
                            &quot;600&quot; :{ &quot;items&quot; : &quot;1&quot; }, 
                            &quot;768&quot; :{ &quot;items&quot; : &quot;2&quot; }, 
                            &quot;992&quot;:{ &quot;items&quot; : &quot;3&quot; }, 
                            &quot;1200&quot;:{ &quot;items&quot; : &quot;4&quot; }
                        }
                        }">

                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->

                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->
                        <!--Start Single Choose Style1-->
                        
                        <!--End Single Choose Style1-->

                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-2400px, 0px, 0px); transition: all 0.5s ease 0s; width: 4800px;"><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2020</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="#" onclick="scrollToDiv()">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="#" onclick="scrollToDiv()">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2021</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2022</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2023</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2020</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="#" onclick="scrollToDiv()">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="#" onclick="scrollToDiv()">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2021</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2022</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2023</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2020</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="#" onclick="scrollToDiv()">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="#" onclick="scrollToDiv()">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2021</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2022</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2023</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2020</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="#" onclick="scrollToDiv()">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="#" onclick="scrollToDiv()">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2021</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2022</h3>
                                </div>
                                <div class="text">
                                    <p>Physical exercise except to some advantages from but who has any right.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="single-choose-style1">
                            <div class="single-choose-style1__inner">
                                <div class="icon">
                                    <span class="icon-tick">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                <div class="inner-title">
                                    <h3>2023</h3>
                                </div>
                                <div class="text">
                                    <p>Indignation &amp; dislike men who beguileds that’s pleasure the
                                        moment.
                                    </p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style2" href="about.html">
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                                <div class="single-choose-style1__overlay" style="background-image: url({{asset('web-assets/images/resources/admission-style1-img-2.jpg')}});">
                                    <div class="btns-box">
                                        <a class="btn-one" href="about.html">
                                            <span class="txt">Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="left icon-right-arrow-1"></span></button><button type="button" role="presentation" class="owl-next"><span class="right icon-right-arrow-1"></span></button></div><div class="owl-dots disabled"></div></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function scrollToDiv() {
            // Get the target div element
            var targetDiv = document.getElementById('mytargetDiv');
    
            if (targetDiv) {
                // Calculate the target position relative to the viewport
                var targetPosition = targetDiv.getBoundingClientRect().top;
    
                // Calculate the current scroll position
                var startPosition = window.pageYOffset || document.documentElement.scrollTop;
    
                // Calculate the final scroll position
                var scrollTo = startPosition + targetPosition;
    
                // Scroll to the target position
                window.scrollTo({
                    top: scrollTo,
                    behavior: 'smooth'
                });
            } else {
                console.error('Div not found');
            }
        }
    </script>
    
    
  </section>

@endsection

@section('page-js')
<script>

</script>
@endsection
