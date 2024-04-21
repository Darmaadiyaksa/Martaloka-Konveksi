<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Foto;
use App\Models\Post;
use App\Models\Video;
use App\Models\Profil;
use App\Models\MdJalur;
use App\Models\MdProdi;
use App\Models\Pegawai;
use App\Models\WebBlog;
use App\Models\Download;
use App\Models\MdKantor;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\SiswaKeberangkatan;
use App\Models\MdPekerjaanJenisSub;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $blog = WebBlog::with('jenis')->where('status',1)->orderby('tglpublish','desc')->take(3)->get();
      $kantor = MdKantor::count();
      $siswajepang = SiswaKeberangkatan::where('idstatus',5)->count();
      $jenispekerjaan = MdPekerjaanJenisSub::wherehas('keberangkatan')->count();
      $pegawai = Pegawai::count();
      return view('welcome', compact('blog','kantor','siswajepang','jenispekerjaan','pegawai'));
    }
}
