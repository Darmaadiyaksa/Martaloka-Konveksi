<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Helper;
use Illuminate\Http\Request;
use App\Models\KalenderKegiatan;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class PengaturanKalenderController extends Controller
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
    return view('pengaturan.kalender.index');
  }

  public function dt()
  {
    $data = KalenderKegiatan::with(['jenis','kantor'])->get();
    return DataTables::of($data)
    ->addColumn('pelaksanaan', function($data) {
      $pelaksanaan = '';
      if ($data->tglmulai == $data->tglselesai) {
        $pelaksanaan = Helper::tanggal($data->tglmulai);
      }else {
        $pelaksanaan = Helper::tanggal($data->tglmulai).' ~ '.Helper::tanggal($data->tglselesai);
      }
      return $pelaksanaan;
    })
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <button type="button" class="btn btn-sm btn-outline-warning" name="button" data-toggle="modal" data-target="#modal-kegiatan" data-backdrop="static" data-keyboard="false" id="btnedit"><i data-feather="edit"></i> Ubah</button>
      </div>';
    })
    ->make(true);
  }

  public function store(Request $request)
  {
    try {
      //dd($request->all());
      $jammulai = $request->jammulai;
      $jamselesai = $request->jamselesai;
      if ($jammulai == null) {
        $jammulai = '06:00:00';
      }
      if ($jamselesai == null) {
        $jamselesai = '22:00:00';
      }
      $request->merge([
        'jammulai' => $jammulai,
        'jamselesai' => $jamselesai,
        'mulai' => $request->tglmulai.' '.$jammulai,
        'selesai' => $request->tglselesai.' '.$jamselesai
      ]);
      $data = KalenderKegiatan::create($request->all());

      return back()->with('notif', json_encode([
        'title' => "KALENDER KEGIATAN",
        'text' => "Berhasil menambahkan $request->nama pada kalender kegiatan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KALENDER KEGIATAN",
        'text' => "Gagal menambah kegiatan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      // dd($request->all());
      $request->merge([
        'mulai' => $request->tglmulai.' '.$request->jammulai,
        'selesai' => $request->tglselesai.' '.$request->jamselesai
      ]);
      KalenderKegiatan::where('id',$request->id)->update($request->except(['id','_token']));

      return back()->with('notif', json_encode([
        'title' => "KALENDER KEGIATAN",
        'text' => "Berhasil mengubah $request->nama pada kalender kegiatan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KALENDER KEGIATAN",
        'text' => "Gagal mengubah kegiatan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
