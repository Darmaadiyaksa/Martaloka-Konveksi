@extends('layouts.app')

@section('menu')
  <li class="{{ request()->is('home*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span></a></li>

  @can('admin')
    <li class="{{ request()->is('masterdata') ? 'open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layers"></i><span class="menu-title text-truncate">Masterdata</span></a>
      <ul class="menu-content">
        <li class="{{ request()->is('masterdata/sekolah*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.sekolah')}}"><i data-feather="{{ request()->is('masterdata/sekolah*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Asal Sekolah</span></a>
        </li>
        <li class="{{ request()->is('masterdata/jenispekerjaan*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.jenispekerjaan')}}"><i data-feather="{{ request()->is('masterdata/jenispekerjaan*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Jenis Pekerjaan</span></a>
        </li>
        <li class="{{ request()->is('masterdata/kantor*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.kantor')}}"><i data-feather="{{ request()->is('masterdata/kantor*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Kantor</span></a>
        </li>
        <li class="{{ request()->is('masterdata/lembaga*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.lembaga')}}"><i data-feather="{{ request()->is('masterdata/lembaga*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Lembaga Pengawas</span></a>
        </li>
        <li class="{{ request()->is('masterdata/lpk-penyangga*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.lpkpenyangga')}}"><i data-feather="{{ request()->is('masterdata/lpk-penyangga*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">LPK Penyangga</span></a>
        </li>
        <li class="{{ request()->is('masterdata/pegawai*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.pegawai')}}"><i data-feather="{{ request()->is('masterdata/pegawai*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Pegawai</span></a>
        </li>
        <li class="{{ request()->is('masterdata/perusahaan*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.perusahaan')}}"><i data-feather="{{ request()->is('masterdata/perusahaan*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Perusahaan</span></a>
        </li>
        <li class="{{ request()->is('masterdata/siswa*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('md.siswa')}}"><i data-feather="{{ request()->is('masterdata/siswa*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Siswa</span></a>
        </li>
      </ul>
    </li>

    <li class="{{ request()->is('pengaturan') ? 'open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-title text-truncate">Pengaturan</span></a>
      <ul class="menu-content">
        <li class="{{ request()->is('pengaturan/kalender*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('kalender')}}"><i data-feather="{{ request()->is('pengaturan/kalender*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Kalender Kegiatan</span></a>
        </li>
        <li class="{{ request()->is('pengaturan/profil*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('profil')}}"><i data-feather="{{ request()->is('pengaturan/profil*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Profil Perusahaan</span></a>
        </li>
      </ul>
    </li>

    <li class="{{ request()->is('reqruitment') ? 'open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span class="menu-title text-truncate">Reqruitment</span></a>
      <ul class="menu-content">
        <li class="{{ request()->is('reqruitment/job-order*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('req.joborder')}}"><i data-feather="{{ request()->is('reqruitment/job-order*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Job Order</span></a>
        </li>
        <li class="{{ request()->is('reqruitment/interview*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('req.interview')}}"><i data-feather="{{ request()->is('reqruitment/interview*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Interview</span></a>
        </li>
      </ul>
    </li>

    <li class="{{ request()->is('kontenweb') ? 'open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="chrome"></i><span class="menu-title text-truncate">Konten Website</span></a>
      <ul class="menu-content">
        <li class="{{ request()->is('kontenweb/galeri*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('web.galeri')}}"><i data-feather="{{ request()->is('kontenweb/galeri*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Galeri Foto</span></a>
        </li>
        <li class="{{ request()->is('kontenweb/informasi*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('web.informasi')}}"><i data-feather="{{ request()->is('kontenweb/informasi*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Informasi</span></a>
        </li>
        <li class="{{ request()->is('kontenweb/lowongan*') ? 'active' : '' }}">
          <a class="d-flex align-items-center" href="{{route('web.lowongan')}}"><i data-feather="{{ request()->is('kontenweb/lowongan*') ? 'disc' : 'circle' }}"></i><span class="menu-item text-truncate">Lowongan</span></a>
        </li>
      </ul>
    </li>
  @endcan

  @can('calon')
    <li class="{{ request()->is('biodata*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('biodata')}}"><i data-feather="user"></i><span class="menu-title text-truncate">Biodata</span></a></li>
  @endcan

  @can('siswa')
    <li class="{{ request()->is('siswa/biodata*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('siswa.biodata')}}"><i data-feather="user"></i><span class="menu-title text-truncate">Biodata</span></a></li>
    
    <li class="{{ request()->is('siswa/kartukeluarga*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('siswa.kk')}}"><i data-feather="file-text"></i><span class="menu-title text-truncate">Kartu Keluarga</span></a></li>
  @endcan

  <li class="nav-item mb-3"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="power"></i><span class="menu-title text-truncate">Logout</span></a></li>
@endsection