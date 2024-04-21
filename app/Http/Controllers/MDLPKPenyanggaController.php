<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use auth;
use Excel;
use Session;
use DateTime;
use App\Helper;
use Illuminate\Http\Request;
use App\Models\LpkPenyangga;
use App\excelexport\excelpegawai;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDLPKPenyanggaController extends Controller
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
    return view('masterdata.lpkpenyangga.index');
  }

  public function dt() {
    $data = LpkPenyangga::all();
    return DataTables::of($data)
      ->addColumn('action', function($data) {
        return '<div style="white-space: nowrap">
        <button type="button" class="btn btn-sm btn-outline-warning" name="button" data-toggle="modal" data-target="#modal-lpk" data-backdrop="static" data-keyboard="false" id="btnedit" value='.$data->id.'><i data-feather="edit"></i> Ubah</button>
        </div>';
      })
      ->make(true);
  }

  public function store(Request $request)
  {
    try {
      // dd($request->all());
      $lpkpenyangga = LpkPenyangga::create($request->all());
      return back()->with('notif', json_encode([
        'title' => "LPK PENYANGGA",
        'text' => "Berhasil menambah data LPK Penyangga baru.",
        'type' => "success"
    ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "LPK PENYANGGA",
        'text' => "Gagal menambah data LPK Penyangga baru, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      LpkPenyangga::where('id',$request->id)->update($request->except(['id','_token']));
      return back()->with('notif', json_encode([
        'title' => "UBAH DATA",
        'text' => "Berhasil mengubah data LPK Penyangga.",
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

}
