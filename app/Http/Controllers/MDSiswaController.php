<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use auth;
use Excel;
use Session;
use DateTime;
use App\Helper;
use App\Models\Siswa;
use App\Models\MdAgama;
use App\Models\UserMesin;
use App\Models\SiswaDetil;
use App\Models\MdKecamatan;
use App\Models\MdPendidikan;
use Illuminate\Http\Request;
use App\Models\SiswaKeluarga;
use App\Models\SiswaPekerjaan;
use App\Models\SiswaPendidikan;
use App\excelexport\excelpegawai;
use App\Models\RiwayatPendidikan;
use App\Models\MdKeluargaHubungan;
use App\Models\SiswaKeluargaJepang;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDSiswaController extends Controller
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
  public function index() {
    Session::put('tabactive', 'biodata');
    return view('masterdata.siswa.index');
  }

  public function dt() {
    $data = Siswa::with(['status','jk'])->get();
    return DataTables::of($data)
      ->addColumn('action', function($data) {
        return '<div style="white-space: nowrap">
        <a href='.route("md.siswa.detail", $data->id).' class="btn btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="user"></i> Detail</a>
        </div>';
      })
    ->make(true);
  }

  public function detail($id)
  {
    $data = Siswa::with(['agama','detil','sekolah','keluarga','keluargajepang','pendidikan'])->where('id',$id)->first();
    $riwayatpendidikan = SiswaPendidikan::with('jenjang')->where('idsiswa',$data->id)->orderby('idjenjang','desc')->get();
    $riwayatpekerjaan = SiswaPekerjaan::with(['bidang','bulanmulai','bulanselesai'])->where('idsiswa',$data->id)->orderby('thnmulai','desc')->get();
    return view('masterdata.siswa.detail', compact('data','riwayatpendidikan','riwayatpekerjaan'));
  }

  public function store(Request $request)
  {
    try {
      $nik = $request->nik;
      $photo = null;
      $dokktp = null;
      $doknpwp = null;
      $dokkk = null;

      $cek = PegawaiDetil::with('pegawai')->where('nik',$nik)->first();
      if ($cek != null && $cek->nik == $nik) {
        return back()->with('notif', json_encode([
          'title' => "TAMBAH DATA",
          'text' => "Gagal menambah data baru, NIK $nik sudah terdaftar a/n ".$cek->pegawai->nama.".",
          'type' => "warning"
        ]));
      }
      
      $pegawai = Pegawai::create([
        'nama' => $request->nama,
        'panggilan' => $request->panggilan,
        'jk' => $request->jk,
        'tplahir' => $request->tplahir,
        'tglahir' => $request->tglahir,
        'idagama' => $request->idagama,
        'nohp' => $request->nohp,
        'alamat' => $request->alamat,
        'idkec' => $request->idkec,
        'email' => $request->email,
        'jenis' => $request->jenis,
        'idstatus' => 1
      ]);

      if ($request->file('photos') != null) {
          $photo = $request->file('photos')->store('pegawai/'.$pegawai->id.'/photo');
      }
      if ($request->file('ktps') != null) {
          $dokktp = $request->file('ktps')->store('pegawai/'.$pegawai->id.'/ktp');
      }
      if ($request->file('npwps') != null) {
          $doknpwp = $request->file('npwps')->store('pegawai/'.$pegawai->id.'/npwp');
      }
      if ($request->file('kks') != null) {
          $dokkk = $request->file('kks')->store('pegawai/'.$pegawai->id.'/kk');
      }
      
      PegawaiDetil::create([
        'idpegawai' => $pegawai->id,
        'nik' => $request->nik,
        'npwp' => $request->npwp,
        'statuskawin' => $request->statuskawin,
        'photo' => $photo,
        'dokktp' => $dokktp,
        'doknpwp' => $doknpwp,
        'dokkk' => $dokkk,
      ]);

      $js = 'pegawai';
      if ($request->jenis == 1) {
        $js = 'guru';
      }

      return redirect('masterdata/'.$js.'/detail/'.$pegawai->id)->with('notif', json_encode([
        'title' => "TAMBAH DATA",
        'text' => "Berhasil menambah data baru.",
        'type' => "success"
    ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA",
        'text' => "Gagal menambah data baru, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::with('detil')->where('id',$request->id)->first();
      $photo = $siswa->detil->photo;
      $dokktp = $siswa->detil->dokktp;
      $dokkk = $siswa->detil->dokkk;

      if ($request->file('photos') != null) {
          $photo = $request->file('photos')->store('siswa/'.$siswa->id.'/photo');
      }
      if ($request->file('ktps') != null) {
          $dokktp = $request->file('ktps')->store('siswa/'.$siswa->id.'/ktp');
      }
      if ($request->file('kks') != null) {
          $doknpwp = $request->file('kks')->store('siswa/'.$siswa->id.'/kk');
      }

      Siswa::where('id',$request->id)->update([
        'nama' => $request->nama,
        'namajp' => $request->namajp,
        'nis' => $request->nis,
        'panggilan' => $request->panggilan,
        'idjk' => $request->idjk,
        'idagama' => $request->idagama,
        'alamat' => $request->alamat,
        'tplahir' => $request->tplahir,
        'tglahir' => $request->tglahir,
        'email' => $request->email,
        'nohp' => $request->nohp,
        'nik' => $request->nik,
        'idkab' => $request->idkab,
        'idprov' => $request->idprov,
        'photo' => $photo,
      ]);
      
      SiswaDetil::where('idsiswa',$request->id)->update([
        'paspor' => $request->paspor,
        'idgoldarah' => $request->idgoldarah,
        'alergi' => $request->alergi,
        'matakiri' => $request->matakiri,
        'matakanan' => $request->matakanan,
        'merokok' => $request->merokok,
        'alkohol' => $request->alkohol,
        'tatto' => $request->tatto,
        'idtangan' => $request->idtangan,
        'idstatuskawin' => $request->idstatuskawin,
        'jmlanak' => $request->jmlanak,
        'tinggi' => $request->tinggi,
        'berat' => $request->berat,
        'idhobi' => $request->idhobi,
        'idkeunggulan' => $request->idkeunggulan,
        'idkekurangan' => $request->idkekurangan,
        'dokktp' => $dokktp,
        'dokkk' => $dokkk,
      ]);

      return back()->with('notif', json_encode([
        'title' => "UBAH BIODATA",
        'text' => "Berhasil mengubah biodata $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH BIODATA",
        'text' => "Gagal mengubah biodata siswa,".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function gethubungan($id)
  {
    $data = MdKeluargaHubungan::where('id',$id)->pluck('nama')->first();
    return $data;
  }

  public function getkeluarga($id)
  {
    $data = SiswaKeluarga::with(['hubungan','pekerjaan'])->where('id',$id)->first();
    return $data;
  }

  public function storekeluarga(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();
      $hubungan = MdKeluargaHubungan::where('id',$request->idhubungan)->pluck('nama')->first();

      if (in_array($request->idhubungan,[1,2,7,8])) {
        $cek = SiswaKeluarga::where('idhubungan',$request->idhubungan)->where('idsiswa',$request->idsiswa)->count();
        if ($cek > 0) {
          return back()->with('notif', json_encode([
            'title' => "TAMBAH DATA KELUARGA",
            'text' => "Gagal, data $hubungan dari $siswa->nama sudah ditambahkan.",
            'type' => "warning"
          ]));
        }
      }      

      SiswaKeluarga::create([
        'idsiswa' => $request->idsiswa,
        'idhubungan' => $request->idhubungan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'idpekerjaan' => $request->idpekerjaan,
        'nohp' => $request->nohp,
      ]);

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA KELUARGA",
        'text' => "Berhasil menambah data $hubungan dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA KELUARGA",
        'text' => "Gagal menambah data keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updatekeluarga(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();
      $hubungan = MdKeluargaHubungan::where('id',$request->idhubungan)->pluck('nama')->first();

      if (in_array($request->idhubungan,[1,2,7,8])) {
        $cek = SiswaKeluarga::where('idhubungan',$request->idhubungan)->where('idsiswa',$request->idsiswa)->where('id','!=',$request->id)->count();
        if ($cek > 0) {
          return back()->with('notif', json_encode([
            'title' => "TAMBAH DATA KELUARGA",
            'text' => "Gagal, data $hubungan dari $siswa->nama sudah ditambahkan.",
            'type' => "warning"
          ]));
        }
      }      

      SiswaKeluarga::where('id',$request->id)->update([
        'idhubungan' => $request->idhubungan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'idpekerjaan' => $request->idpekerjaan,
        'nohp' => $request->nohp,
      ]);

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA KELUARGA",
        'text' => "Berhasil mengubah data $hubungan dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA KELUARGA",
        'text' => "Gagal mengubah data keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function deletekeluarga(Request $request)
  {
    try {
      $data = SiswaKeluarga::with(['siswa','hubungan'])->where('id',$request->id)->first(); 
      SiswaKeluarga::where('id',$request->id)->delete();

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA KELUARGA",
        'text' => "Berhasil menghapus data ".$data->hubungan->nama." dari ".$data->siswa->nama.".",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA KELUARGA",
        'text' => "Gagal menghapus data keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function getkeluargajepang($id)
  {
    $data = SiswaKeluargaJepang::with(['hubungan','perfektur'])->where('id',$id)->first();
    return $data;
  }

  public function storekeluargajepang(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();

      SiswaKeluargaJepang::create($request->all());

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH KELUARGA DI JEPANG",
        'text' => "Berhasil menambah data keluarga di jepang dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH KELUARGA DI JEPANG",
        'text' => "Gagal menambah data keluarga di jepang, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updatekeluargajepang(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();

      SiswaKeluargaJepang::where('id',$request->id)->update($request->except(['id','idsiswa','_token']));

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "UBAH KELUARGA DI JEPANG",
        'text' => "Berhasil mengubah data keluarga di Jepang dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH KELUARGA DI JEPANG",
        'text' => "Gagal mengubah data keluarga di Jepang, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function deletekeluargajepang(Request $request)
  {
    try {
      $data = SiswaKeluargaJepang::with('siswa')->where('id',$request->id)->first(); 
      SiswaKeluargaJepang::where('id',$request->id)->delete();

      Session::put('tabactive', 'keluarga');
      
      return back()->with('notif', json_encode([
        'title' => "HAPUS KELUARGA DI JEPANG",
        'text' => "Berhasil menghapus data keluarga di Jepang dari ".$data->siswa->nama.".",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "HAPUS KELUARGA DI JEPANG",
        'text' => "Gagal menghapus data keluarga di jepang, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function getpendidikan($id)
  {
    $data = SiswaPendidikan::with('jenjang')->where('id',$id)->first();
    return $data;
  }

  public function storependidikan(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();
      $jenjang = MdPendidikan::where('id',$request->idjenjang)->pluck('nama')->first();
      
      $dokijazah = null;
      if ($request->file('ijazahs') != null) {
          $dokijazah = $request->file('ijazahs')->store('siswa/'.$siswa->id.'/ijazah');
      }

      SiswaPendidikan::create([
        'idsiswa' => $request->idsiswa,
        'idjenjang' => $request->idjenjang,
        'namasekolah' => $request->namasekolah,
        'thnmasuk' => $request->thnmasuk,
        'tgllulus' => $request->tgllulus,
        'dokijazah' => $dokijazah,
      ]);

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA PENDIDIKAN",
        'text' => "Berhasil menambah data pendidikan $jenjang dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA PENDIDIKAN",
        'text' => "Gagal menambah data pendidikan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updatependidikan(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();
      $pendidikan = SiswaPendidikan::with('jenjang')->where('id',$request->id)->first();
      
      $dokijazah = $pendidikan->dokijazah;
      if ($request->file('ijazahs') != null) {
          $dokijazah = $request->file('ijazahs')->store('siswa/'.$siswa->id.'/ijazah');
      }

      SiswaPendidikan::where('id',$request->id)->update([
        'idjenjang' => $request->idjenjang,
        'namasekolah' => $request->namasekolah,
        'thnmasuk' => $request->thnmasuk,
        'tgllulus' => $request->tgllulus,
        'dokijazah' => $dokijazah,
      ]);

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PENDIDIKAN",
        'text' => "Berhasil mengubah data pendidikan ".$pendidikan->jenjang->nama." dari $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PENDIDIKAN",
        'text' => "Gagal mngubah data pendidikan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function deletependidikan(Request $request)
  {
    try {
      $data = SiswaPendidikan::with(['siswa','jenjang'])->where('id',$request->id)->first(); 
      SiswaPendidikan::where('id',$request->id)->delete();

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA PENDIDIKAN",
        'text' => "Berhasil menghapus data pendidikan ".$data->jenjang->nama." dari ".$data->siswa->nama.".",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA PENDIDIKAN",
        'text' => "Gagal menghapus data pendidikan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function getpekerjaan($id)
  {
    $data = SiswaPekerjaan::with(['bidang','bulanmulai','bulanselesai'])->where('id',$id)->first();
    return $data;
  }

  public function storepekerjaan(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();

      SiswaPekerjaan::create($request->all());

      Session::put('tabactive', 'pekerjaan');
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA PEKERJAAN",
        'text' => "Berhasil menambah data pekerjaan di $request->namaperusahaan untuk $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA PEKERJAAN",
        'text' => "Gagal menambah data pekerjaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updatepekerjaan(Request $request)
  {
    try {
      // dd($request->all());
      $siswa = Siswa::where('id',$request->idsiswa)->first();

      SiswaPekerjaan::where('id',$request->id)->update($request->except(['id','idsiswa','_token']));

      Session::put('tabactive', 'pekerjaan');
      
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PEKERJAAN",
        'text' => "Berhasil mengubah data pekerjaan milik $siswa->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PEKERJAAN",
        'text' => "Gagal mngubah data pekerjaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function deletepekerjaan(Request $request)
  {
    try {
      $data = SiswaPekerjaan::with('siswa')->where('id',$request->id)->first(); 
      SiswaPekerjaan::where('id',$request->id)->delete();

      Session::put('tabactive', 'pekerjaan');
      
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA PEKERJAAN",
        'text' => "Berhasil menghapus data pekerjaan di $data->namaperusahaan milik ".$data->siswa->nama.".",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA PEKERJAAN",
        'text' => "Gagal menghapus data pekerjaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function cetakcv(Request $request)
  {
    $job = null;
    $data = Siswa::with(['agama','jk','kabupaten','detil','keluarga'])->where('id',$request->id)->first();
    $pendidikan = SiswaPendidikan::with('jenjang')->where('idsiswa',$data->id)->orderby('idjenjang','desc')->first();
    $f4 = array(0,0,609.449,935.433);
    $pdf = PDF::loadView('masterdata.siswa.cv', compact('job','data','pendidikan'))->setPaper('A4');
    return $pdf->stream('CV - '.$data->nama.'.pdf');
  }

  public function exportexcel(Request $request)
  {
    $jenis = $request->jenispegawai;
    $status = PegawaiStatus::where('id',$request->idstatus)->pluck('nama')->first();
    $tgl = date('Y-m-d');
    $tgl = Helper::tanggal($tgl);
    $namafile = 'Pegawai '.$status;
    if ($jenis == 1) {
      $namafile = 'Guru '.$status;
    }
    if ($request->idstatus == null) {
      $data = Pegawai::with(['status','kecamatan.kabupaten','detil','user'])->where('jenis',$jenis)->get();
    }else {
      $data = Pegawai::with(['status','kecamatan.kabupaten','detil','user'])->where('jenis',$jenis)->where('idstatus',$request->idstatus)->get();
    }
    
    return Excel::download(new excelpegawai($data), 'Data '.$namafile.' ('.$tgl.').xlsx');
    return view('masterdata.pegawai.excel', compact('data'));
  }
}
