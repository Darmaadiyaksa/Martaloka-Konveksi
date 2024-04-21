<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MdSekolah;
use App\Models\MdSekolahProvinsi;
use App\Helper;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use Auth;
class MdSekolahController extends Controller
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
    return view('masterdata.sekolah.index');
  }

  public function dt()
  {
    $data = MdSekolah::with(['provinsi'])->selectraw('idprov, count(idprov) as jumlah')->groupby('idprov')->get();
    return DataTables::of($data)
    ->addColumn('action', function($data) {
      return '
      <a class="btn btn-sm btn-outline-info waves-effect waves-float waves-light" style="white-space:nowrap" href="'.route("md.sekolah.detil",$data->idprov).'" title="Tapilkan Daftar Sekolah"><i data-feather="file-text"></i> Daftar Sekolah
      </a>
      ';
      })
    ->make(true);
  }

  public function detil($id)
  {
    $data = MdSekolah::with(['provinsi'])->where('idprov',$id)->first();
    if ($data == null) {
      abort('404');
    }
    return view('masterdata.sekolah.detail', compact('data'));
  }

  public function dtdetil($id)
  {
    $data = MdSekolah::with(['provinsi'])->where('idprov',$id)->get();
    return DataTables::of($data)
    ->make(true);
  }

  public function store(Request $request)
  {
    try {
      MdSekolah::create([
        'idprov' => $request->idprov,
        'idsekolah' => $request->idsekolah,
        'npsn' => $request->npsn,
        'nama' => $request->nama,
        'bentuk' => $request->bentuk,
        'jenis' => $request->jenis,
        'alamat' => $request->alamat,
        'koordinat' => $request->koordinat,
      ]);

      return redirect('/masterdata/sekolah/detil/'.$request->idprov)->with('notif', json_encode([
        'title' => "DATA SEKOLAH",
        'text' => "Berhasil menambah data asal sekolah.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "DATA SEKOLAH",
        'text' => "Gagal menambah data asal sekolah, ".$e->getMessage(),
        'type' => "error"
      ]));
    }

  }

}
