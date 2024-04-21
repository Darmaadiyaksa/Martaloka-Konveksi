@extends('layouts.master')

@section('title-head', 'Informasi')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-7.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Informasi</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="active">Informasi</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-page-two">
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <div class="blog-page-two__content">
            <div class="row">
              <div class="col-xl-12">
                @foreach ($data as $d)
                  <div class="single-blog-style2">
                    <div class="single-blog-style2__img-holder">
                      <div class="inner">
                        <img src="{{asset($d->cover)}}" alt="">
                      </div>
                    </div>
                    <div class="single-blog-style2__text-holder">
                      <div class="top">
                        <div class="category-box">
                          <div class="dot-box"></div>
                          <p>{{$d->jenis->nama}}</p>
                        </div>
                      </div>
                      @php
                        $strlenitem = Str::length($d->judul);
                        if ($strlenitem > 55) {
                          $judul_cut = substr($d->judul, 0, 55);
                          if ($judul_cut[54] != ' ') {
                            $new_pos = strrpos($judul_cut, ' ');
                            $judul_cut = substr($d->judul, 0, $new_pos);
                            $judul_cut = $judul_cut.'...';
                          }else {
                            $judul_cut = substr($d->judul, 0, 54);
                            $judul_cut = $judul_cut.'...';
                          }
                        }else {
                          $judul_cut = $d->judul;
                        }
                      @endphp
                      <h3 class="blog-title">
                        <a href="{{route('informasi.detail',$d->slug)}}">
                          {{$judul_cut}}
                        </a>
                      </h3>
                      @php
                        $d->isi = strip_tags($d->isi);
                        $strlendesc = Str::length($d->isi);
                        if ($strlendesc > 100) {
                          $isi_cut = substr($d->isi, 0, 100);
                          if ($isi_cut[99] != ' ') {
                            $new_pos = strrpos($isi_cut, ' ');
                            $isi_cut = substr($d->isi, 0, $new_pos);
                            $isi_cut = $isi_cut.'...';
                          } else {
                            $isi_cut = substr($d->isi, 0, 99);
                            $isi_cut = $isi_cut.'...';
                          }
                        } else {
                          $isi_cut = $d->isi;
                        }
                        $rpc_isi = strip_tags($isi_cut, '<p>');
                      @endphp
                      <div class="text">
                        <p>{!! $rpc_isi !!}</p>
                      </div>
                      <div class="bottom-box">
                        <div class="btn-box">
                          <a href="{{route('informasi.detail', $d->slug)}}">
                            <span class="icon-right-arrow-1"></span>Selengkapnya
                          </a>
                        </div>
                        <div class="meta-info">
                          <ul>
                            <li>
                              <span class="icon-calendar"></span>
                              <a href="#">{{ (new \App\Helper)->tglblog($d->tglpublish) }}</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="row">
              <div class="col-xl-12 text-center">
                {{ $data->appends(request()->input())->links('pagination::pagination') }}
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
