@extends('layouts.master')

@section('title-head', 'Detail Informasi')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-7.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Detail Informasi</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li><a href="{{route('web.informasi')}}">informasi</a></li>
                <li class="active">Detail Informasi</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="blog-details-page">
    <div class="container">
        <div class="row">

            <div class="col-xl-9">
                <div class="blog-details-page__content">
                    <div class="blog-details-page__content__inner">

                        <div class="blog-details-page__img-box">
                          <img src="{{asset($data->cover)}}" alt="">
                        </div>

                        <div class="blog-details-page__quote-box">
                            <div class="inner">
                                <div class="icon">
                                    <span class="icon-quote"></span>
                                </div>
                                <div class="inner-title">
                                    <h3>{{$data->judul}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="blog-details-page__text-2">
                            {!! $data->isi !!}
                        </div>

                        <div class="blog-details-page__tag-box">
                            <div class="inner-title">
                                <h3># Posted In:</h3>
                            </div>
                            <ul>
                                <li>Activities,</li>
                                <li>Ferstivals,</li>
                                <li>Sports</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-5">
              <div class="thm-sidebar-box">
  
                  <div class="sidebar-search-box">
                    <form class="search-form" action="#" method="get">
                      <input type="hidden" name="kategori" value="{{ request()->input('kategori') == null ? null : request()->input('kategori') }}">
                      <input  name="pencarian" value="{{ request()->input('pencarian') }}" placeholder="Pencarian..." type="text">
                      <button type="submit">
                          <i class="icon-zoom"></i>
                      </button>
                      @csrf
                    </form>
                  </div>
  
                  <div class="single-sidebar-box">
                      <div class="sidebar-title">
                          <div class="dot-box"></div>
                          <h3>Kategori</h3>
                      </div>
                      <ul class="sidebar-categories-box">
                          <form method="get" action="#">
                            <input type="hidden" name="pencarian" value="{{ request()->input('pencarian') == null ? null : request()->input('pencarian') }}">          
                            <li>
                              <input type="submit" name="kategori" value="semua">
                              <a href="#" onclick="return(false);" class="{{ request()->input('kategori') == 'semua' || request()->input('kategori') == '' ? 'active' : '' }} {{ request()->input('kategori') == 'semua' ? '' : 'pilihKategori' }}">Semua <span>{{$semua}}</span></a>
                            </li>
                            @foreach ($jenis as $j)
                              @if ($j->blog_count > 0)
                                <li>
                                  <input type="submit" name="kategori" value="{{ $j->nama }}">
                                  <a href="#" onclick="return(false);" class="{{ request()->input('kategori') ==  $j->nama ? 'active' : '' }} {{ request()->input('kategori') == $j->nama ? '' : 'pilihKategori' }}">{{$j->nama}} <span>{{$j->blog_count}}</span></a>
                                </li>
                              @endif
                            @endforeach
                            @csrf
                          </form>
                      </ul>
                  </div>
  
                  <div class="single-sidebar-box">
                      <div class="sidebar-title">
                          <div class="dot-box"></div>
                          <h3>Populer</h3>
                      </div>
                      <div class="sidebar-blog-post">
                          <ul class="blog-post">
                            @foreach ($populer as $p)  
                              <li>
                                  <div class="inner">
                                      <div class="img-box">
                                          <img src="{{asset($p->cover)}}" alt="Awesome Image">
                                          <div class="overlay-content">
                                              <a href="#">
                                                  <i class="fa fa-link" aria-hidden="true"></i>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="title-box">
                                          <div class="post-date">
                                              <span class="icon-date"></span> {{ (new \App\Helper)->tglblog($p->tglpublish) }}
                                          </div>
                                          <h4>
                                              @php
                                                  $strlenitem = Str::length($p->judul);
                                                  if ($strlenitem > 40) {
                                                      $judul_cut = substr($p->judul, 0, 40);
                                                      if ($judul_cut[39] != ' ') {
                                                          $new_pos = strrpos($judul_cut, ' ');
                                                          $judul_cut = substr($p->judul, 0, $new_pos);
                                                          $judul_cut = $judul_cut.'...';
                                                      } else {
                                                          $judul_cut = substr($p->judul, 0, 39);
                                                          $judul_cut = $judul_cut.'...';
                                                      }
                                                  } else {
                                                      $judul_cut = $p->judul;
                                                  }
                                              @endphp
                                              <a href="#">
                                                  {{$judul_cut}}
                                              </a>
                                          </h4>
                                      </div>
                                  </div>
                              </li>
                            @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
  
              {{-- <div class="single-sidebar-box">
                <div class="sidebar-title">
                  <div class="dot-box"></div>
                  <h3>Kategori</h3>
                </div>
                <ul class="sidebar-categories-box">
                  @foreach ($jenis as $j)
                    <li><a href="#">{{$j->nama}} <span>{{$j->jml}}</span></a></li>
                  @endforeach
                </ul>
              </div>
  
              <div class="single-sidebar-box">
                <div class="sidebar-title">
                  <div class="dot-box"></div>
                  <h3>Populer</h3>
                </div>
                <div class="sidebar-blog-post">
                  <ul class="blog-post">
                    @foreach ($populer as $p)
                      <li>
                        <div class="inner">
                          <div class="img-box">
                            <img src="{{asset($p->cover)}}">
                            <div class="overlay-content">
                              <a href="blog-single.html">
                                <i class="fa fa-link" aria-hidden="true"></i>
                              </a>
                            </div>
                          </div>
                          <div class="title-box">
                            <div class="post-date">
                              <span class="icon-date"></span> {{date('d-m-Y', strtotime($p->tglpublish))}}
                            </div>
                            @php
                              $strlenitem = Str::length($p->judul);
                              if ($strlenitem > 30) {
                                $judul_cut = substr($p->judul, 0, 30);
                                if ($judul_cut[29] != ' ') {
                                  $new_pos = strrpos($judul_cut, ' ');
                                  $judul_cut = substr($p->judul, 0, $new_pos);
                                  $judul_cut = $judul_cut.'...';
                                }else {
                                  $judul_cut = substr($p->judul, 0, 29);
                                  $judul_cut = $judul_cut.'...';
                                }
                              }else {
                                $judul_cut = $p->judul;
                              }
                            @endphp
                            <h4>
                              <a href="blog-single.html">
                                {{$judul_cut}}
                              </a>
                            </h4>
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div> --}}
            </div>
        </div>
    </div>
  </section>
@endsection

@section('page-js')
<script>
  $(document).ready(function () {
      $('.pilihKategori').click(function () {
          $(this).prev('input').click();
      });
      $('.pilihTag').click(function () {
          $(this).prev('input').click();
      });
  });
</script>
@endsection
