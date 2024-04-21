<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use Illuminate\Http\Request;
use App\Models\MdPekerjaanJenis;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDJenisPekerjaanController extends Controller
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
    return view('masterdata.jenispekerjaan.index');
  }

  public function dt()
  {
    $data = MdPekerjaanJenis::withcount(['keberangkatan as jmlsiswa','sub as jmlsub'])->get();
    return DataTables::of($data)
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <button type="button" class="btn btn-sm btn-outline-warning" name="button" data-toggle="modal" data-target="#modal-jenis" data-backdrop="static" data-keyboard="false" id="btnedit" value='.$data->id.'><i data-feather="edit"></i> Ubah</button>
        <a href='.route("md.jenispekerjaan.detail", $data->id).' class="btn btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="file-text"></i> Detail</a>
      </div>';
    })
    ->make(true);
  }

  public function detail($id)
  {
    $data = MdPekerjaanJenis::with('sub.keberangkatan')->withcount('keberangkatan as jmlsiswa')->where('id',$id)->first();
    return view('masterdata.jenispekerjaan.detail', compact('data'));
  }

  public function store(Request $request)
  {
    try {
      $cek = MdPekerjaanJenis::where('nama',$request->nama)->count();
      if ($cek > 0) {
        return back()->with('notif', json_encode([
          'title' => "DATA JENIS PEKERJAAN",
          'text' => "Jenis pekerjaan dengan nama $request->nama sudah terdaftar.",
          'type' => "warning"
        ]));
      }
      $data = MdPekerjaanJenis::create([
        'nama' => $request->nama
      ]);

      return redirect('masterdata/jenispekerjaan/detail/'.$data->id)->with('notif', json_encode([
        'title' => "DATA JENIS PEKERJAAN",
        'text' => "Berhasil menambah data jenis pekerjaan $request->nama.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA JENIS PEKERJAAN",
        'text' => "Gagal menambah data jenis pekerjaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      MdPekerjaanJenis::where('id',$request->idperusahaan)->update([
        'nama' => $request->nama
      ]);

      return back()->with('notif', json_encode([
        'title' => "DATA JENIS PEKERJAAN",
        'text' => "Berhasil mengubah data jenispekerjaan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA JENIS PEKERJAAN",
        'text' => "Gagal mengubah data jenispekerjaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
