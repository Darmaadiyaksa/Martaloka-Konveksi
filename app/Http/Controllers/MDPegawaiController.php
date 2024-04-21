<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use auth;
use Excel;
use Session;
use DateTime;
use App\Helper;
use App\Models\Pegawai;
use App\Models\UserMesin;
use App\Models\MdKecamatan;
use App\Models\MdPendidikan;
use App\Models\PegawaiDetil;
use Illuminate\Http\Request;
use App\Models\PegawaiStatus;
use App\excelexport\excelpegawai;
use App\Models\PegawaiPendidikan;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MDPegawaiController extends Controller
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
    return view('masterdata.pegawai.index');
  }

  public function dt($idkantor = null) {
    if ($idkantor == 0) {
      $idkantor = null;
    }
    $data = Pegawai::with(['jenis','user','kantor','jk'])
            ->when(!empty($idkantor), function ($query) use ($idkantor) {
                return $query->where('idkantor',$idkantor);
            })->get();
    $usermesin = UserMesin::wherehas('user.pegawai', function ($query) {
                return $query->where('idstatus',1);
            })->get();
    return DataTables::of($data)
      ->addColumn('action', function($data) use($usermesin) {
        $user = '';
        $btnfinger = '';
        $datafinger = 0;
        if ($data->user == null) {
          $user ='<button type="button" class="btn btn-outline-danger btn-icon btn-sm waves-effect waves-float waves-light" name="button" id="btnuser" data-toggle="modal" data-target="#modal-user" data-backdrop="static" data-keyboard="false" style="white-space: nowrap" title="Buat User"><i data-feather="user-plus"></i></button>';
        }else {
          $datafinger = count($usermesin->where('iduser',$data->user->id)->where('finger',1));
        }
        if ($datafinger == 0) {
          $btnfinger =' <a href='.route("md.pegawai.detail", $data->id).' class="btn btn-icon btn-outline-warning btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><img src='.asset("assets/images/finger-plus-warning.png").' height="14px" title="Sidik Jari Belum Terdaftar"></a>';
        }
        return '<div style="white-space: nowrap">'.$user.$btnfinger.'
        <a href='.route("md.pegawai.detail", $data->id).' class="btn btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="user"></i> Detail</a>
        </div>';
      })
      ->make(true);
  }

  public function create()
  {
    $data = null;
    return view('masterdata.pegawai.create', compact('data'));
  }

  public function detail($id)
  {
    $data = Pegawai::with(['status','kecamatan.kabupaten','detil','user','jk','jabatan'])->where('id',$id)->first();
    $riwayatpendidikan = PegawaiPendidikan::with('jenjang')->where('idpegawai',$data->id)->orderby('idjenjang','desc')->get();
    return view('masterdata.pegawai.detail', compact('data','riwayatpendidikan'));
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
          'title' => "TAMBAH PEGAWAI",
          'text' => "Gagal menambah data baru, NIK $nik sudah terdaftar a/n ".$cek->pegawai->nama.".",
          'type' => "warning"
        ]));
      }

      $request->merge([
        'idstatus' => 1
      ]);
      
      $pegawai = Pegawai::create($request->all());

      if ($request->file('photos') != null) {
        $namafile = 'photo-'.$request->file('photos')->getClientOriginalName().'.'.$request->file('photos')->extension();
        $photo =  $request->file('photos')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$namafile);
      }
      if ($request->file('ktps') != null) {
        $dokktp =  $request->file('ktps')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('ktps')->getClientOriginalName());
      }
      if ($request->file('npwps') != null) {
        $doknpwp =  $request->file('npwps')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('npwps')->getClientOriginalName());
      }
      if ($request->file('kks') != null) {
        $dokkk =  $request->file('kks')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('kks')->getClientOriginalName());
      }

      $request->merge([
        'idpegawai' => $pegawai->id,
        'photo' => $photo,
        'dokktp' => $dokktp,
        'dokkk' => $dokkk,
        'doknpwp' => $doknpwp,
      ]);
      
      PegawaiDetil::create($request->all());

      Session::put('tabactive', 'biodata');

      return redirect('masterdata/pegawai/detail/'.$pegawai->id)->with('notif', json_encode([
        'title' => "TAMBAH PEGAWAI",
        'text' => "Berhasil menambah $request->nama sebagai pegawai baru.",
        'type' => "success"
    ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH PEGAWAI",
        'text' => "Gagal menambah data baru, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function edit($id)
  {
    $data = Pegawai::with(['detil','agama','jk'])->where('id',$id)->first();
    return view('masterdata.pegawai.create', compact('data'));
  }

  public function getpegawai($id)
  {
    $data = Pegawai::with(['kecamatan','kabupaten','provinsi','detil'])->where('id',$id)->first();
    return $data;
  }

  public function update(Request $request)
  {
    try {
      Pegawai::where('id',$request->idpegawai)->update([
        'nama' => $request->nama,
        'panggilan' => $request->panggilan,
        'idjk' => $request->idjk,
        'idkantor' => $request->idkantor,
        'idjabatan' => $request->idjabatan,
        'tplahir' => $request->tplahir,
        'tglahir' => $request->tglahir,
        'idagama' => $request->idagama,
        'nohp' => $request->nohp,
        'alamat' => $request->alamat,
        'idprov' => $request->idprov,
        'idkab' => $request->idkab,
        'idkec' => $request->idkec,
        'email' => $request->email
      ]);

      $pegawai = Pegawai::with('detil')->where('id',$request->idpegawai)->first();
      $photo = $pegawai->detil->photo;
      $dokktp = $pegawai->detil->dokktp;
      $doknpwp = $pegawai->detil->doknpwp;
      $dokkk = $pegawai->detil->dokkk;

      if ($request->file('photos') != null) {
        if ($photo != null) {
          Storage::delete($photo);
          $file = explode('.',$request->file('photos')->getClientOriginalName());
          $namabaru = $file[0];
        }else {
          $namabaru = 'photo-'.$request->file('photos')->getClientOriginalName();
        }
        $namafile = $namabaru.'.'.$request->file('photos')->extension();
        $photo =  $request->file('photos')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$namafile);
      }
      if ($request->file('ktps') != null) {
        $dokktp =  $request->file('ktps')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('ktps')->getClientOriginalName());
      }
      if ($request->file('npwps') != null) {
        $doknpwp =  $request->file('npwps')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('npwps')->getClientOriginalName());
      }
      if ($request->file('kks') != null) {
        $dokkk =  $request->file('kks')->storeAs('pegawai/'.$pegawai->id.'/datadiri',$request->file('kks')->getClientOriginalName());
      }

      PegawaiDetil::where('idpegawai',$request->idpegawai)->update([
        'nik' => $request->nik,
        'npwp' => $request->npwp,
        'nokk' => $request->nokk,
        'idstatuskawin' => $request->idstatuskawin,
        'photo' => $photo,
        'dokktp' => $dokktp,
        'doknpwp' => $doknpwp,
        'dokkk' => $dokkk,
      ]);

      Session::put('tabactive', 'biodata');

      return redirect('masterdata/pegawai/detail/'.$pegawai->id)->with('notif', json_encode([
        'title' => "UBAH DATA",
        'text' => "Berhasil mengubah data $pegawai->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA",
        'text' => "Gagal mengubah data,".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updatekepegawaian(Request $request)
  {
    try {
      Pegawai::where('id',$request->idpegawai)->update([
        'idjenis' => $request->idjenis,
        'idjabatan' => $request->idjabatan,
        'idstatus' => $request->idstatus,
        'nip' => $request->nip,
      ]);

      $pegawai = Pegawai::with('detil')->where('id',$request->idpegawai)->first();
      $doksk = $pegawai->detil->doksk;
      if ($request->file('sks') != null) {
        $doksk = $request->file('sks')->storeAs('pegawai/'.$pegawai->id.'/sk',$request->file('sks')->getClientOriginalName());
      }

      PegawaiDetil::where('idpegawai',$request->idpegawai)->update([
        'skpengangkatan' => $request->skpengangkatan,
        'tmtpengangkatan' => $request->tmtpengangkatan,
        'nobpjs' => $request->nobpjs,
        'nobpjskesehatan' => $request->nobpjskesehatan,
        'doksk' => $doksk,
      ]);

      Session::put('tabactive', 'kepeg');

      return back()->with('notif', json_encode([
        'title' => "DATA KEPEGAWAIAN",
        'text' => "Berhasil memperbarui data kepegawaian $pegawai->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA KEPEGAWAIAN",
        'text' => "Gagal memperbarui data kepegawaian,".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }
  
  public function getpendidikan($id)
  {
    $data = PegawaiPendidikan::with('jenjang')->where('id',$id)->first();
    return $data;
  }

  public function storependidikan(Request $request)
  {
    try {
      // dd($request->all());
      $pegawai = Pegawai::where('id',$request->idpegawai)->first();
      $jenjang = MdPendidikan::where('id',$request->idjenjang)->pluck('nama')->first();
      
      $dokijazah = null;
      if ($request->file('ijazahs') != null) {
          $dokijazah = $request->file('ijazahs')->storeAs('pegawai/'.$pegawai->id.'/ijazah',$request->file('ijazahs')->getClientOriginalName());
      }

      $request->merge([
        'dokijazah' => $dokijazah
      ]);

      PegawaiPendidikan::create($request->all());

      if ($request->idjenjang > $pegawai->idpendidikan) {
        Pegawai::where('id',$request->idpegawai)->update([
          'idpendidikan' => $request->idjenjang
        ]);
      }

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH DATA PENDIDIKAN",
        'text' => "Berhasil menambah data pendidikan $jenjang dari $pegawai->nama.",
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
      $pegawai = Pegawai::where('id',$request->idpegawai)->first();
      $pendidikan = PegawaiPendidikan::with('jenjang')->where('id',$request->id)->first();
      
      $dokijazah = $pendidikan->dokijazah;
      if ($request->file('ijazahs') != null) {
          $dokijazah = $request->file('ijazahs')->store('pegawai/'.$pegawai->id.'/ijazah');
      }

      $request->merge([
        'dokijazah' => $dokijazah
      ]);

      PegawaiPendidikan::where('id',$request->id)->update($request->except(['id','ijazahs','_token']));

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PENDIDIKAN",
        'text' => "Berhasil mengubah data pendidikan ".$pendidikan->jenjang->nama." dari $pegawai->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA PENDIDIKAN",
        'text' => "Gagal mengubah data pendidikan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function deletependidikan(Request $request)
  {
    try {
      $data = PegawaiPendidikan::with(['pegawai','jenjang'])->where('id',$request->id)->first(); 
      PegawaiPendidikan::where('id',$request->id)->delete();

      Session::put('tabactive', 'pendidikan');
      
      return back()->with('notif', json_encode([
        'title' => "HAPUS DATA PENDIDIKAN",
        'text' => "Berhasil menghapus data pendidikan ".$data->jenjang->nama." dari ".$data->pegawai->nama.".",
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

  public function generatenpk(Request $request)
  {
    try {
      $data = PegawaiDetil::with('pegawai.kantor')->wherehas('pegawai')
            ->orderby('tmtpengangkatan','asc')->get();
      $no = 0;
      foreach ($data as $d) {
        $nourut = str_pad($no+1, 3, '0', STR_PAD_LEFT);
        $nip = 'ASK.'.$d->pegawai->kantor->kode.'-'.date('Y-m',strtotime($d->tmtpengangkatan)).'/'.$nourut;
        Pegawai::where('id',$d->idpegawai)->update([
          'nip' => $nip
        ]);
        $no++;
      }
      return back()->with('notif', json_encode([
        'title' => "NOMOR INDUK PEGAWAI",
        'text' => "Berhasil memproses generate nomor induk untuk $no pegawai.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "NOMOR INDUK PEGAWAI",
        'text' => "Gagal memproses generate nomor induk,".$e->getMessage(),
        'type' => "error"
      ]));
    }
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
