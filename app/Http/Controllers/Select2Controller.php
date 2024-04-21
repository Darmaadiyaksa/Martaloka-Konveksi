<?php

namespace App\Http\Controllers;

use App\Models\MdDesa;
use App\Models\MdHobi;
use App\Models\MdAgama;
use App\Models\MdBulan;
use App\Models\Pegawai;
use App\Models\MdKantor;
use App\Models\MdTangan;
use App\Models\Countries;
use App\Models\MdJabatan;
use App\Models\MdSekolah;
use App\Models\MdProvinsi;
use App\Models\MdKabupaten;
use App\Models\MdKecamatan;
use App\Models\MdPekerjaan;
use App\Models\MdPerfektur;
use App\Models\MdKekurangan;
use App\Models\MdKeunggulan;
use App\Models\MdPendidikan;
use App\Models\MdPerusahaan;
use Illuminate\Http\Request;
use App\Models\MdStatusKawin;
use App\Models\PegawaiStatus;
use App\Models\UnitBagianSub;
use App\Models\MdPegawaiJenis;
use App\Models\MdGolonganDarah;
use App\Models\MdKegiatanJenis;
use App\Models\MdPegawaiStatus;
use App\Models\MdInformasiJenis;
use App\Models\MdPekerjaanJenis;
use App\Models\MdLembagaPengawas;
use App\Models\MdSekolahProvinsi;
use App\Models\MdKeluargaHubungan;
use App\Models\MdPekerjaanJenisSub;
use App\Models\MdKeluargaHubunganKk;

class Select2Controller extends Controller
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

  public function agama(Request $request)
  {
    $term = trim($request->q);
    $datas = MdAgama::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function bulan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdBulan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function desa(Request $request)
  {
    $term = trim($request->q);
    $idkec = $request->idkec;
    $datas = MdDesa::where('idkec',$idkec)->when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function goldarah(Request $request)
  {
    $term = trim($request->q);
    $datas = MdGolonganDarah::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->namajp];
    }
    return response()->json($ta);
  }

  public function hobi(Request $request)
  {
    $term = trim($request->q);
    $datas = MdHobi::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function hubungan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKeluargaHubungan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->where('jepang',0)->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function hubungankk(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKeluargaHubunganKk::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function hubunganjepang(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKeluargaHubungan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function jenispekerjaan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPekerjaanJenis::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function pekerjaan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPekerjaan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function perfektur(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPerfektur::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function perusahaan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPerusahaan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function sekolah(Request $request)
  {
    $term = trim($request->q);
    $idprov = $request->idprov;
    $datas = MdSekolah::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->where('idprov',$idprov)->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }

    if ($request->idprov == 35) {
      $ta[] = ['id' => 'baru', 'text' => 'Lainnya'];
    }
    return response()->json($ta);
  }

  public function statuskerja(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPegawaiStatus::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function jabatan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdJabatan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function jenisinformasi(Request $request)
  {
    $term = trim($request->q);
    $datas = MdInformasiJenis::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function jeniskegiatan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKegiatanJenis::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->wherenot('id',2)->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function jenispegawai(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPegawaiJenis::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function jenjangpendidikan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdPendidikan::where('id','>',2)->when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function kantor(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKantor::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function kabupaten(Request $request)
  {
    $term = trim($request->q);
    $idprov = $request->idprov;
    $datas = MdKabupaten::where('idprov',$idprov)->when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function kecamatan(Request $request)
  {
    $term = trim($request->q);
    $idkab = $request->idkab;
    $datas = MdKecamatan::where('idkab',$idkab)->when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function keunggulan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKeunggulan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function kekurangan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdKekurangan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function lembaga(Request $request)
  {
    $term = trim($request->q);
    $datas = MdLembagaPengawas::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function pegawai(Request $request)
  {
    $term = trim($request->q);
    $datas = Pegawai::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function provinsi(Request $request)
  {
    $term = trim($request->q);
    $datas = MdProvinsi::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }

  public function statuskawin(Request $request)
  {
    $term = trim($request->q);
    $datas = MdStatusKawin::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function subpekerjaan(Request $request)
  {
    $term = trim($request->q);
    $idjenis = $request->idjenis;
    $datas = MdPekerjaanJenisSub::where('idjenis',$idjenis)->when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->orderby('nama','asc')->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function tangan(Request $request)
  {
    $term = trim($request->q);
    $datas = MdTangan::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama.' '.$data->namajp];
    }
    return response()->json($ta);
  }

  public function wn(Request $request)
  {
    $term = trim($request->q);
    $datas = Countries::when(!empty($term), function ($query) use ($term) {
          return $query->where('nama', 'LIKE', '%'. $term .'%');
      })->get();
    $ta  = array();
    foreach ($datas as $data) {
        $ta[] = ['id' => $data->id, 'text' => $data->nama];
    }
    return response()->json($ta);
  }
}
