<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use App\Models\MdPerusahaan;
use Illuminate\Http\Request;
use App\Models\MdLembagaPengawas;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MDLembagaController extends Controller
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
    return view('masterdata.lembaga.index');
  }

  public function dt()
  {
    $data = MdLembagaPengawas::withcount('perusahaan as jmlperusahaan')->get();
    return DataTables::of($data)
    ->addColumn('action', function($data) {
      return '
      <button type="button" class="btn btn-sm btn-outline-warning" name="button" data-toggle="modal" data-target="#modal-lembaga" data-backdrop="static" data-keyboard="false" id="btnedit" value='.$data->id.'><i data-feather="edit"></i> Ubah</button>
      ';
      })
    ->make(true);
  }

  public function store(Request $request)
  {
    try {
      $cek = MdLembagaPengawas::where('nama',$request->nama)->count();
      if ($cek > 0) {
        return back()->with('notif', json_encode([
          'title' => "DATA LEMBAGA PENGAWAS",
          'text' => "Lembaga Pengawas dengan nama $request->nama sudah terdaftar.",
          'type' => "warning"
        ]));
      }

      $dokmou = null;
      if ($request->file('mous') != null) {
          $dokmou = $request->file('mous')->store('lembaga/mou');
      }

      $request->merge([
        'dokmou' => $dokmou
      ]);

      MdLembagaPengawas::create($request->all());

      return back()->with('notif', json_encode([
        'title' => "DATA LEMBAGA PENGAWAS",
        'text' => "Berhasil menambah data lembaga pengawas.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA LEMBAGA PENGAWAS",
        'text' => "Gagal menambah data lembaga pengawas, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function getperusahaan($id)
  {
    $data = MdPerusahaan::where('idlembaga',$id)->orderby('nama','asc')->get();
    $table ='<div class="table-responsive">
      <table class="table table-bordered table-striped mb-0">
        <thead class="text-center">
          <th>No</th>
          <th>Nama Perusahaan</th>
        </thead>
        <tbody>';
          $no = 1;
          foreach ($data as $d) {
            $table.='<tr>
              <td class="text-center">'.$no.'</td>
              <td>'.$d->nama.'</td>
            </tr>';
            $no++;
          }
          $table.='</tbody>
      </table>
    </div>';
    return $table;
  }

  public function update(Request $request)
  {
    try {
      $lembaga = MdLembagaPengawas::where('id',$request->idlembaga)->first();
      $dokmou = $lembaga->dokmou;
      if ($request->file('mous') != null) {
          $dokmou = $request->file('mous')->store('lembaga/mou');
      }

      $request->merge([
        'dokmou' => $dokmou
      ]);

      MdLembagaPengawas::where('id',$request->idlembaga)->update($request->except(['idlembaga','id','mous','_token']));

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
