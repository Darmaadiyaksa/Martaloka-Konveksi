@extends('layouts.master')

@section('title-head', 'Galeri')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-6.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Galeri</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="active">Galeri</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="events-page-one">
    <div class="container">
      <div class="row">
        @foreach ($data as $d)
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="single-event-one">
              <div class="single-event-one__inner">
                <a href="#">
                  <div class="img-holder">
                      <img src="{{asset($d->gambar)}}" alt="">
                    <div class="overlay-content">
                      <div class="date-box">
                        <h2>{{date('d',strtotime($d->tglpublish))}}</h2>
                        <h4>{{ (new \App\Helper)->blngaleri($d->tglpublish) }}</h4>
                      </div>
                    </div>
                  </div>
                </a>
                <div class="text-holder py-0">
                  <div class="text">
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
                    <p>{{$judul_cut}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </section>
@endsection

@section('page-js')
<script>

</script>
@endsection
