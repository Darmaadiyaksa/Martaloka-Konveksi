<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Siswa;
use App\Models\Daftar;
use App\Models\MdBulan;
use App\Models\Mahasiswa;
use App\Models\MahasiswaPpg;
use App\Models\MdPerusahaan;
use Illuminate\Http\Request;
use App\Models\MdPeriode;
use App\Models\PpgMhsSimulasi;
use App\Models\PpgJadwalSimulasi;
use App\Models\SiswaKeberangkatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function sessiontema($id)
    {
      Session::put('tema',$id);
    }

    public function index()
    {
      if (Auth::user()->role == 1) {
        return self::admin();
      }
      if (Auth::user()->role == 3) {
        if (Auth::user()->siswa != null) {
          return self::siswa();
        }else {
          return self::calon();
        }
      }
      return view('home');
    }

    public static function admin(){
      // cek data periode, otomatis insert saat kosong
      $cekperiode = MdPeriode::where('tahun',date('Y')+1)->count();
      if ($cekperiode == 0) {
        $bulan = MdBulan::all();
        foreach ($bulan as $b) {
          MdPeriode::create([
            'idbulan' => $b->id,
            'tahun' => date('Y')+1
          ]);
        }
      }
      
      $jepang = SiswaKeberangkatan::where('idstatus',5)->count();
      $kursus = Siswa::where('idstatus',1)->count();
      $perusahaan = MdPerusahaan::count();
      $bulan = MdBulan::get();
      $datagrafik = SiswaKeberangkatan::with('bulan')->where('idstatus',5)
            ->where('tahun','>=',date('Y') - 1)
            ->selectraw('tahun, idbulan, count(idsiswa) as jml')->groupby('tahun')->groupby('idbulan')->orderby('tahun','asc')->orderby('idbulan','asc')->get();
      $grafik = array();
      $thnlalu = 0;
      $thnini = 0;
      foreach($bulan as $b){
        $value0 = $datagrafik->where('idbulan',$b->id)->where('tahun',date('Y'))->first()->jml ?? 0;
        $value1 = $datagrafik->where('idbulan',$b->id)->where('tahun',date('Y')-1)->first()->jml ?? 0;
        $g[0]['name'] = date('Y');
        $g[0]['data'][] = $value0;
        $g[1]['name'] = date('Y')-1;
        $g[1]['data'][] = $value1;
        $thnlalu += $value1;
        $thnini += $value0;
      }
      $grafik =json_encode($g);
      $bulan = json_encode(MdBulan::get()->pluck('alias'));

      return view('home', compact('jepang','kursus','perusahaan','grafik','bulan','thnlalu','thnini'));
    }

    public static function calon()
    {
      $data = Daftar::where('id',Auth::user()->link)->first();
      return view('calon', compact('data'));
    }


    public static function siswa()
    {
      $data = Siswa::with('detil')->where('iddaftar',Auth::user()->link)->first();
      return view('siswa', compact('data'));
    }

    
}
