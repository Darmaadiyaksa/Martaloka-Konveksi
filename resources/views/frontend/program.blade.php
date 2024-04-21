@extends('layouts.master')

@section('title-head', 'Program')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-5.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Program</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li>Profil</li>
                <li class="active">Program</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="degrees-graduate-area">
    <div class="degrees-graduate-area__bg"></div>
    <div class="container">
      <div class="degrees-graduate-top-title">
        <div class="sec-title">
          <h2>Program Unggulan</h2>
          <div class="sub-title">
            <p>Program unggulan yang mendukung Anda menuju kesuksesan.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Kursus<br> Bahasa Jepang</h3>
              </div>
              <p style="height: calc(22px* 3)">Dibuka untuk umum untuk memperdalam bahasa</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-6.jpg')}}" alt="">
              </div>
              <div class="btn-box"  style="zoom:0.8; bottom:148px;">
                <a href="#kursusJepang"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Pelatihan<br> Bahasa Jepang</h3>
              </div>
              <p style="height: calc(22px* 3)">Pelatihan dari guru yang berpengalaman & tersertifikasi</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-5.jpg')}}" alt="">
              </div>
              <div class="btn-box" style="zoom:0.8; bottom:148px;">
                <a href="#pelatihanJepang"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-xl-4 col-lg-4">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Pengenalan<br> Budaya Jepang</h3>
              </div>
              <p>Pengenalan budaya & sistem kerja di negara Jepang</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-1.jpg')}}" alt="">
              </div>
              <div class="btn-box">
                <a href="#"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-xl-4 col-lg-4">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Pelatihan<br> Bidang Keahlian</h3>
              </div>
              <p>Pelatihan sesuai standar kerja di Jepang</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-3.jpg')}}" alt="">
              </div>
              <div class="btn-box">
                <a href="#"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="col-xl-3 col-lg-3">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Ginou<br> Jisshuusei</h3>
              </div>
              <p style="height: calc(22px* 3)">Magang teknis sesuai bidang keahlian ke Jepang</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-4.jpg')}}" alt="">
              </div>
              <div class="btn-box" style="zoom:0.8; bottom:148px;">
                <a href="#ginou"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3">
          <div class="single-degrees-graduate-box">
            <div class="top">
              <div class="inner-title">
                <h3>Tokutei<br> Ginou</h3>
              </div>
              <p style="height: calc(22px* 3)">Penerimaan tenaga kerja asing di Jepang</p>
            </div>
            <div class="img-box">
              <div class="inner">
                <img src="{{asset('web-assets/images/aktivitas/aktivitas-2.jpg')}}" alt="">
              </div>
              <div class="btn-box" style="zoom:0.8; bottom:148px;">
                <a href="#tokutei"><span class="icon-right-arrow-1"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="events-page-two" id="kursusJepang">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Kursus</h2>
                        <h4>Bahasa Jepang</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Umum</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Program kursus bahasa Jepang dibuka untuk umum bagi yang ingin memperdalam bahasa Jepang, baik karena tuntutan pekerjaan maupun untuk mempersiapkan diri sebelum tes kemampuan bahasa Jepang. Program kursus bahasa Jepang di LPK Aska Bali menjamin Anda bisa berbahasa Jepang dengan baik dalam waktu singkat bersama guru yang kompeten dan profesional.</p>
                      <p>LPK Aska menyediakan 3 level kursus, yakni N5, N4 dan N3 sehingga siswa dapat mengikuti kelas yang ideal sesuai kebutuhan. Melalui program kursus ini para siswa akan diajarkan lima keterampilan berbahasa Jepang, yaitu berbicara atau berdialog (kaiwa), pemahaman mendengar (choukai), pemahaman bacaan (dokkai), kosakata dan tata bahasa (goi to bunpou), serta huruf (moji).</p>
                      <div class="bottom">
                        <div class="btn-box" id="pelatihanJepang">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Pelatihan</h2>
                        <h4>Bahasa Jepang</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Siswa LPK Aska Bali</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Disusun dalam kurikulum yang efektif dan tepat agar dapat lulus tes kemampuan bahasa Jepang dalam waktu yang singkat. Lama proses pelatihan bahasa Jepang dirancang selama 6 bulan untuk bisa menguasai materi ujian, trik-trik ujian, serta kemampuan berbicara dalam bahasa Jepang agar siap mengikuti proses interview kerja bersama perusahaan Jepang.</p>
                      <p>Proses belajar dilaksanakan hari Senin hingga hari Jumat (pukul 09.00 – 16.00 WITA) dan hari Sabtu diadakan tes mingguan untuk menilai pemahaman siswa dalam seminggu belajar serta untuk melihat perkembangan siswa selama proses pelatihan. Guru-guru yang melatih di lembaga kami adalah guru berpengalaman dan bersertifikasi agar dapat menghasilkan calon tenaga kerja yang berkualitas.</p>
                      <div class="bottom">
                        <div class="btn-box" id="ginou">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Pengenalan</h2>
                        <h4>Budaya Jepang</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Siswa LPK Aska Bali</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Mempersiapkan seluruh peserta magang agar mengenal budaya & sistem kerja di negara Jepang.</p>
                      <div class="bottom">
                        <div class="btn-box">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Pelatihan</h2>
                        <h4>Keahlian</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Siswa LPK Aska Bali</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Mempersiapkan seluruh peserta magang agar mengenal budaya & sistem kerja di negara Jepang.</p>
                      <div class="bottom">
                        <div class="btn-box">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Ginou</h2>
                        <h4>Jisshuusei</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Siswa LPK Aska Bali</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Program magang teknis sesuai bidang keahlian ke Jepang. Program magang teknis ini diadakan dengan tujuan untuk orang-orang yang ingin mendapatkan pengetahuan keterampilan di Jepang lalu turut berkontribusi dalam pembangunan ekonomi negara setelah kembali ke negaranya sendiri dengan memanfaatkan berbagai pengetahuan yang telah dipelajari. Saat ini LPK ASKA Bali membuka program Ginou Jisshuusei bidang perawat lansia atau dalam bahasa Jepang disebut kaigo. Selama di Jepang para pekerja magang dibimbing dan diawasi oleh pekerja yang lebih berpengalaman atau senior. Profesi perawat lansia (kaigo) bertugas untuk mendampingi, memberi perhatian, merawat dan membantu kebutuhan dasar pasien lanjut usia di luar kebutuhan medis.</p>
                      <p>Seiring dengan terus bertambahnya jumlah lansia di Jepang, dibutuhkan pula lebih banyak lagi tenaga perawat lansia (kaigo) yang bekerja di Jepang. Oleh sebab itu pemerintah Jepang membuka kesempatan sebesar-besarnya bagi tenaga kerja asing untuk bekerja magang di Jepang sebagai perawat lansia (kaigo). Bekerja di Jepang sebagai perawat lansia (kaigo) merupakan peluang yang sangat baik karena selain memiliki lingkungan kerja yang kondusif juga memiliki standar upah yang cukup tinggi</p>
                      <div class="bottom">
                        <div class="btn-box" id="tokutei">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-12">
            <div class="single-event-two">
              <div class="single-event-two__inner">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="single-event-two__info-box">
                      <div class="date-box">
                        <h2>Tokutei</h2>
                        <h4>Ginou</h4>
                      </div>
                      <ul>
                        <li><span class="icon-user"></span> Siswa LPK Aska Bali</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="single-event-two__text-box">
                      <p>Program baru yang dikeluarkan oleh pemerintah Jepang untuk menerima tenaga kerja asing dari luar negeri. Program baru ini telah resmi disahkan pada 1 April 2019. Berbeda dengan program kenshuu atau jisshuusei, program ini memberikan status tinggal sebagai pekerja bukan tenaga magang. Pada dasarnya program ini adalah program mandiri. Jadi jika anda sendiri mampu berbahasa Jepang dengan baik dapat melamar langsung ke perusahaan yang anda inginkan. Namun, ada baiknya anda melalui lembaga pelatihan agar peluang mendapat perusahaan lebih besar. Ada 14 bidang pekerjaan dalam tokutei ginou, namun di Indonesia sendiri tes bidang yang sudah tersedia saat ini yakni bidang perawat lansia, pengolahan makanan dan minuman, serta restoran.</p>
                      <p>Program Tokutei Ginou ini merupakan peluang bagi eks jisshuusei yang ingin kembali pergi ke Jepang untuk bekerja. Hanya saja data-data ketika dulu menjadi jisshuusei masih lengkap. Terutama data sertifikat penyelesaian program dari JITCO atau OTIT, CV dan Formulir CoE yang dulu dikumpulkan ke Imigrasi Jepang.</p>
                      <div class="bottom">
                        <div class="btn-box">
                          <a href="{{route('pendaftaran-daftar')}}">
                            <span class="icon-right-arrow-1"></span>Daftar Sekarang
                          </a>
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
    </div>
  </section>
@endsection

@section('page-js')
<script>

</script>
@endsection
