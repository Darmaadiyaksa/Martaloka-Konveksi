<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use App\Helper;
use App\Models\Siswa;
use App\Models\JobOrder;
use Illuminate\Support\Str;
use App\Models\MdPerusahaan;
use Illuminate\Http\Request;
use App\Models\JobOrderDetil;
use App\Models\SiswaPendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ReqJobOrderController extends Controller
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
    return view('reqruitment.joborder.index');
  }

  public function dt()
  {
    $data = JobOrder::with(['perusahaan.lembaga','jenispekerjaan','subpekerjaan'])->withcount('detil as jmlsiswa')->get();
    return DataTables::of($data)
    ->addColumn('tanggal', function($data) {
      return Helper::tanggal($data->tglinterview);
    })
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <a href='.route("req.joborder.detail", $data->id).' class="btn btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="file-text"></i> Detail</a>
      </div>';
    })
    ->make(true);
  }

  public function store(Request $request)
  {
    try {
      dd($request->all());
      $perusahaan = MdPerusahaan::where('id',$request->idperusahaan)->pluck('nama')->first();

      $request->merge([
        'tgl' => date('Y-m-d'),
        'iduser' => Auth::user()->id
      ]);

      $job = JobOrder::create($request->all());
      
      return redirect('reqruitment/job-order/detail/'.$job->id)->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Berhasil menambah job order dari $perusahaan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Gagal menambah job order, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function update(Request $request)
  {
    try {
      // dd($request->all());
      $job = JobOrder::with('perusahaan')->where('id',$request->id)->first();
      $perusahaan = $job->perusahaan->nama;

      $request->merge([
        'iduser' => Auth::user()->id
      ]);

      $job = JobOrder::where('id',$request->id)->update($request->except(['id','_token']));
      
      return back()->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Berhasil mengubah job order dari $perusahaan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Gagal mengubah job order, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function detail($id)
  {
    $data = JobOrder::with(['detil','perusahaan','subpekerjaan','pic'])->where('id',$id)->first();
    $siswa = Siswa::with('jk')->where('idstatus',1)->whereDoesntHave('interview.jobaktif')
          ->orderby('nama','asc')->get();
    return view('reqruitment.joborder.detail', compact('data','siswa'));
  }

  public function storesiswa(Request $request)
  {
    try {
      // dd($request->all());
      $job = JobOrder::with('perusahaan')->where('id',$request->id)->first();
      $perusahaan = $job->perusahaan->nama;

      $i = 0; $jml = 0;
      foreach ($request->siswa2 as $s) {
        $pilih = 'a'.$i;
        if ($request->$pilih != null) {
          JobOrderDetil::create([
            'idjob' => $request->id,
            'idsiswa' => $request->siswa[$i],
            'iduser' => Auth::user()->id
          ]);
          $jml++;
        }
        $i++;
      }
      
      return back()->with('notif', json_encode([
        'title' => "TAMBAH SISWA",
        'text' => "Berhasil menambah $jml siswa untuk job order dari $perusahaan",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "TAMBAH SISWA",
        'text' => "Gagal menambah siswa, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function delete(Request $request)
  {
    try {
      // dd($request->all());
      $job = JobOrder::with('perusahaan')->where('id',$request->id)->first();
      $perusahaan = $job->perusahaan->nama;

      JobOrder::where('id',$request->id)->delete();
      
      return redirect('reqruitment/job-order')->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Berhasil menghapus job order dari $perusahaan",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "JOB ORDER",
        'text' => "Gagal menghapus job order, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function cetakcv(Request $request)
  {
    $job = JobOrder::with(['perusahaan','detil'])->where('id',$request->idjob)->first();
    $data = Siswa::with(['agama','jk','kabupaten','detil','keluarga'])->where('id',$request->idsiswa)->first();
    $pendidikan = SiswaPendidikan::with('jenjang')->where('idsiswa',$data->id)->orderby('idjenjang','desc')->first();
    $f4 = array(0,0,609.449,935.433);
    $pdf = PDF::loadView('masterdata.siswa.cv', compact('job','data','pendidikan'))->setPaper('A4');
    return $pdf->stream('CV - '.$data->nama.'.pdf');
  }

  public function cetakcvall(Request $request)
  {
    $job = JobOrder::with(['perusahaan','detil'])->where('id',$request->idjob)->first();
    $f4 = array(0,0,609.449,935.433);
    $pdf = PDF::loadView('reqruitment.joborder.cv-all', compact('job'))->setPaper('A4');
    return $pdf->stream('CV - Job Order '.$job->perusahaan->nama.'.pdf');
  }

}
