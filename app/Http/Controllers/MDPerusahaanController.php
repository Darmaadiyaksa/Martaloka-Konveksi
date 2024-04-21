<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use App\Models\MdPerusahaan;
use Illuminate\Http\Request;
use App\Models\MdPerusahaanAlamat;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDPerusahaanController extends Controller
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
    return view('masterdata.perusahaan.index');
  }

  public function dt()
  {
    $data = MdPerusahaan::with('lembaga')->withcount('keberangkatan as jmlsiswa')->get();
    return DataTables::of($data)
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <a href='.route("md.perusahaan.detail", $data->id).' class="btn btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="file-text"></i> Detail</a>
      </div>';
    })
    ->make(true);
  }

  public function detail($id)
  {
    $data = MdPerusahaan::with(['lembaga','alamat','keberangkatan'])->where('id',$id)->first();
    return view('masterdata.perusahaan.detail', compact('data'));
  }

  public function store(Request $request)
  {
    try {
      $cek = MdPerusahaan::where('nama',$request->nama)->count();
      if ($cek > 0) {
        return back()->with('notif', json_encode([
          'title' => "DATA PERUSAHAAN",
          'text' => "Perusahaan dengan nama $request->nama sudah terdaftar.",
          'type' => "warning"
        ]));
      }
      $data = MdPerusahaan::create([
        'nama' => $request->nama,
        'namajp' => $request->namajp,
        'idlembaga' => $request->idlembaga,
      ]);

      if ($request->alamat != null) {
        MdPerusahaanAlamat::create([
          'idperusahaan' => $data->id,
          'alamat' => $request->alamat,
        ]);
      }

      return redirect('masterdata/perusahaan/detail/'.$data->id)->with('notif', json_encode([
        'title' => "DATA PERUSAHAAN",
        'text' => "Berhasil menambah data perusahaan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA PERUSAHAAN",
        'text' => "Gagal menambah data perusahaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      MdPerusahaan::where('id',$request->idperusahaan)->update([
        'nama' => $request->nama,
        'namajp' => $request->namajp
      ]);

      return back()->with('notif', json_encode([
        'title' => "DATA LEMBAGA PENGAWAS",
        'text' => "Berhasil mengubah data lembaga pengawas.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA LEMBAGA PENGAWAS",
        'text' => "Gagal mengubah data lembaga pengawas, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
