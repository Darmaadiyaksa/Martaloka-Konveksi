<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use App\Models\MdKantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDKantorController extends Controller
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
    return view('masterdata.kantor.index');
  }

  public function dt()
  {
    $data = MdKantor::all();
    return DataTables::of($data)
    ->addColumn('action', function($data) {
      return '
      <button type="button" class="btn btn-sm btn-outline-warning" name="button" data-toggle="modal" data-target="#modal-kantor" data-backdrop="static" data-keyboard="false" id="btnedit" value='.$data->id.'><i data-feather="edit"></i> Ubah</button>
      ';
      })
    ->make(true);
  }

  public function store(Request $request)
  {
    try {
      MdKantor::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'idjenis' => $request->idjenis,
      ]);

      return back()->with('notif', json_encode([
        'title' => "DATA KANTOR",
        'text' => "Berhasil menambah data kantor.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA KANTOR",
        'text' => "Gagal menambah data kantor, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      MdKantor::where('id',$request->idkantor)->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'idjenis' => $request->idjenis,
      ]);

      return back()->with('notif', json_encode([
        'title' => "DATA KANTOR",
        'text' => "Berhasil mengubah data kantor.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA KANTOR",
        'text' => "Gagal mengubah data kantor, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
