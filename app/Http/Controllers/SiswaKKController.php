<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Helper;
use App\Models\SiswaKk;
use Illuminate\Http\Request;
use App\Models\SiswaKkAnggota;
use App\Models\MdPekerjaanJenis;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class SiswaKKController extends Controller
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

  public function index()
  {
    $data = SiswaKk::with('anggota')->where('idsiswa',Auth::user()->siswa->id)->first();
    return view('siswa.kk.index', compact('data'));
  }

  public function store(Request $request)
  {
    try {
      $cek = SiswaKk::where('idsiswa',Auth::user()->siswa->id)->first();

      if ($cek == null) {
        $dokkk = null;
        if ($request->file('kks') != null) {
          $dokkk = $request->file('kks')->store('siswa/'.Auth::user()->siswa->id.'/kk');
        }
        $request->merge([
          'dokkk' => $dokkk,
          'idsiswa' => Auth::user()->siswa->id
        ]);
        SiswaKk::create($request->all());
        $notif = 'melengkapi';
      }else {
        $dokkk = $cek->dokkk;
        if ($request->file('kks') != null) {
          $dokkk = $request->file('kks')->store('siswa/'.Auth::user()->siswa->id.'/kk');
        }
        $request->merge([
          'dokkk' => $dokkk,
          'idsiswa' => Auth::user()->siswa->id
        ]);
        SiswaKk::where('idsiswa',Auth::user()->siswa->id)->update($request->except(['id','kks','_token']));
        $notif = 'mengubah';
      }

      return back()->with('notif', json_encode([
        'title' => "KARTU KELUARGA",
        'text' => "Berhasil $notif isian Kartu Keluarga.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KARTU KELUARGA",
        'text' => "Gagal melengkapi isian Kartu Keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function storeanggota(Request $request)
  {
    try {
      $kk = SiswaKk::with('anggota')->where('idsiswa',Auth::user()->siswa->id)->first();
      if ($request->idhubungan == 1) {
        $cekkepala = $kk->anggota->where('idhubungan',1)->count();
        if ($cekkepala > 0) {
          return back()->with('notif', json_encode([
            'title' => "ANGGOTA KELUARGA",
            'text' => "Kepala Keluarga sudah terdaftar.",
            'type' => "warning"
          ]));
        }
      }
      $request->merge([
        'idkk' => $kk->id
      ]);
      SiswaKkAnggota::create($request->all());

      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Berhasil menambah anggota keluarga.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Gagal menambah anggota keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function updateanggota(Request $request)
  {
    try {
      $kk = SiswaKk::with('anggota')->where('idsiswa',Auth::user()->siswa->id)->first();
      if ($request->idhubungan == 1) {
        $cekkepala = $kk->anggota->where('idhubungan',1)->where('id','!=',$request->id)->count();
        if ($cekkepala > 0) {
          return back()->with('notif', json_encode([
            'title' => "ANGGOTA KELUARGA",
            'text' => "Kepala Keluarga sudah terdaftar.",
            'type' => "warning"
          ]));
        }
      }

      SiswaKkAnggota::where('id',$request->id)->update($request->except(['id','idkk','_token']));

      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Berhasil mengubah data anggota keluarga.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Gagal mengubah data anggota keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function getanggota($id)
  {
    $data = SiswaKkAnggota::with(['agama','jk','pendidikan','pekerjaan','goldarah','statuskawin','hubungan','wn'])->where('id',$id)->first();
    return $data;
  }

  public function deleteanggota(Request $request)
  {
    try {
      $kk = SiswaKkAnggota::where('id',$request->id)->first();
      SiswaKkAnggota::where('id',$request->id)->delete();

      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Berhasil menghapus $kk->nama dari anggota keluarga.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "ANGGOTA KELUARGA",
        'text' => "Gagal menghapus anggota keluarga, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function cetak(Request $request)
  {
    $data = SiswaKk::with(['anggota','siswa'])->where('id',$request->id)->first();
    $f4 = array(0,0,609.449,935.433);
    $pdf = PDF::loadView('siswa.kk.cetak', compact('data'))->setPaper('A4','landscape');
    return $pdf->stream('Kartu Keluarga - '.$data->siswa->nama.'.pdf');
  }

}
