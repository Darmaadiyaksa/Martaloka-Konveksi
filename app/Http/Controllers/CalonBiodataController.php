<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Daftar;
use App\Models\DaftarDetil;
use App\Models\DaftarKeluarga;
use App\Models\DaftarJalur;
use App\Models\DaftarPekerjaan;
use App\Models\MdAgama;
use App\Models\MdKecamatan;
use App\Models\MdPekerjaan;
use App\Models\MdSekolah;
use App\Models\MdSekolahJurusan;
use App\Models\MdJenisCalon;
use App\Models\MdProdiFeeder;
use App\Models\MdPangkat;
use App\Models\Countries;
use App\Helper;
use DB;
use PDF;
use auth;
use DataTables;
use DateTime;
use Session;
class CalonBiodataController extends Controller
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
    $data = DaftarDetil::with('daftar.pekerjaan')->where('iddaftar',auth::user()->link)->first();
    $keluarga = DaftarKeluarga::where('iddaftar',auth::user()->link)->first();
    $pekerjaan = DaftarPekerjaan::with('pekerjaan')->where('iddaftar',auth::user()->link)->first();
    $jeniscalon = MdJenisCalon::get();
    $daftar = DaftarJalur::with(['jalur','biaya','prodi.prodi','tagihandu'])->where('iddaftar',auth::user()->link)->orderby('id','desc')->get();
    return view('biodata.index', compact('data','keluarga', 'pekerjaan','jeniscalon','daftar'));
  }

  public function edit() {
    $data = DaftarDetil::with('daftar.jalur.prodi')->where('iddaftar',auth::user()->link)->first();
    $keluarga = DaftarKeluarga::where('iddaftar',auth::user()->link)->first();
    $kantor = DaftarPekerjaan::where('iddaftar',auth::user()->link)->first();
    $agama = MdAgama::all();
    $pekerjaan = MdPekerjaan::all();
    $pangkat = MdPangkat::all();
    $countries = Countries::all();
    $kecamatan = MdKecamatan::with('kabupaten.provinsi')->get();
    $jurusan = MdSekolahJurusan::all();

    return view('biodata.edit', compact('data','keluarga', 'kantor', 'pangkat','kecamatan','agama','pekerjaan','countries','jurusan'));
  }

  public function update(Request $request)
  {
    try {
      if ($request->idasalsekolah == 'baru') {
        $sekolahbaru = MdSekolah::create([
          'idprov' => $request->idprovsekolah,
          'nama' => $request->sekolahbaru,
          'alamat' => $request->alamatsekolahbaru,
        ]);
        $idasalsekolah = $sekolahbaru->id;
      }else {
        $idasalsekolah = $request->idasalsekolah;
      }
      $data = DaftarDetil::where('iddaftar',$request->id)->first();
      $kantor = DaftarPekerjaan::where('iddaftar',$request->id)->first();
      if ($request->idkecamatan == null) {
        $idkecamatan = null;
      }else {
        $idkecamatan = $request->idkecamatan.'  ';
      }
      Daftar::where('id',$request->id)->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'telpon' => $request->telpon,
        'nik' => $request->nik,
      ]);

      $asalpt = MdProdiFeeder::where('id',$request->idasalprodi)->pluck('idpt')->first();
      $photo = $data->photo;
      $ktp = $data->ktp;
      $idjenis = 1;

      if (in_array($request->idasalsekolah,[10163, 10184, 10226, 10229, 10252, 10257, 10260, 10265, 10289, 10297, 10300, 24388, 24390, 24395, 24462, 24485])) {
        $idjenis = 3;
      }

      if (in_array($asalpt,[1618,8934])) {
        $idjenis = 3;
      }

      if ($request->idwn != 360) {
        $idjenis = 6;
      }

      if ($request->file('photos') != null) {
          $photo = $request->file('photos')->store('daftar/'.$request->id.'/photo');
      }

      if ($request->file('ktps') != null) {
        $ktp = $request->file('ktps')->store('daftar/'.$request->id.'/ktp');
      }

      DaftarDetil::where('iddaftar',$request->id)->update([
        'idjenis' => $idjenis,
        'panggilan' => $request->panggilan,
        'idagama' => $request->idagama,
        'jk' => $request->jk,
        'tempatlahir' => $request->tempatlahir,
        'tgllahir' => $request->tgllahir,
        'berat' => $request->berat,
        'tinggi' => $request->tinggi,
        'ukuranbaju' => $request->ukuranbaju,
        'statuskawin' => $request->statuskawin,
        'alamat' => $request->alamat,
        'idkecamatan' => $idkecamatan,
        'kodepos' => $request->kodepos,
        'idasalsekolah' => $idasalsekolah,
        'idjurusan' => $request->idjurusan,
        'nisn' => $request->nisn,
        'idasalprodi' => $request->idasalprodi,
        'nim' => $request->nim,
        'tgllulus' => $request->tgllulus,
        'noijazah' => $request->noijazah,
        'ktp' => $ktp,
        'idwn' => $request->idwn,
        'photo' => $photo,
      ]);

      DaftarKeluarga::where('iddaftar',$request->id)->update([
        'namaayah' => $request->namaayah,
        'namaibu' => $request->namaibu,
        'idpekerjaanayah' => $request->idpekerjaanayah,
        'idpekerjaanibu' => $request->idpekerjaanibu,
        'penghasilan' => $request->penghasilan,
        'alamatortu' => $request->alamatortu,
        'telepon' => $request->telepon,
        'emailortu' => $request->emailortu,
        'jmlsaudara' => $request->jmlsaudara,
        'anakke' => $request->anakke,
      ]);

      if ($kantor == null && $request->idpekerjaan != null) {
        DaftarPekerjaan::create([
          'iddaftar' => $request->id,
          'namakantor' => $request->namakantor,
          'alamat' => $request->alamatkantor,
          'jabatan' => $request->jabatan,
          'nip' => $request->nip,
          'idpangkat' => $request->idpangkat,
          'idpekerjaan' => $request->idpekerjaan,
          'awalbekerja' => $request->awalbekerja,
        ]);
      }elseif ($kantor != null) {
        DaftarPekerjaan::where('iddaftar',$request->id)->update([
          'namakantor' => $request->namakantor,
          'alamat' => $request->alamatkantor,
          'jabatan' => $request->jabatan,
          'nip' => $request->nip,
          'idpangkat' => $request->idpangkat,
          'idpekerjaan' => $request->idpekerjaan,
          'awalbekerja' => $request->awalbekerja,
        ]);
      }

      return redirect('biodata')->with('notif', json_encode([
        'title' => "UBAH BIODATA",
        'text' => "Berhasil mengubah Biodata.",
        'type' => "success"
    ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "UBAH BIODATA",
        'text' => "Gagal mengubah Biodata, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
