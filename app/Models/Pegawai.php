<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \app\Helper;
use DateTime;

class Pegawai extends Model
{
  protected $guarded = ['id'];

  public function detil()
  {
    return $this->hasone(PegawaiDetil::class,'idpegawai','id');
  }

  public function agama()
  {
    return $this->hasone(MdAgama::class,'id','idagama');
  }

  public function pendidikan()
  {
    return $this->hasone(MdPendidikan::class,'id','idpendidikan');
  }

  public function riwayatpendidikan()
  {
    return $this->hasmany(PegawaiPendidikan::class,'idpegawai','id');
  }

  public function kantor()
  {
    return $this->hasone(MdKantor::class,'id','idkantor');
  }

  public function kecamatan()
  {
    return $this->hasone(MdKecamatan::class,'id','idkec');
  }

  public function kabupaten()
  {
    return $this->hasone(MdKabupaten::class,'id','idkab');
  }

  public function provinsi()
  {
    return $this->hasone(MdProvinsi::class,'id','idprov');
  }

  public function status()
  {
    return $this->hasone(MdPegawaiStatus::class,'id','idstatus');
  }

  public function jenis()
  {
    return $this->hasone(MdPegawaiJenis::class,'id','idjenis');
  }

  public function jabatan()
  {
    return $this->hasone(MdJabatan::class,'id','idjabatan');
  }

  public function jk()
  {
    return $this->hasone(MdJk::class,'id','idjk');
  }

  public function wn()
  {
    return $this->hasone(Countries::class,'id','idwn');
  }

  public function user()
  {
    return $this->hasone(User::class,'link','id')->where('role','<',3);
  }

  public function presensiharian()
  {
    return $this->hasone(PegawaiPresensi::class,'idpegawai','id')->where('tanggal',date('Y-m-d'));
  }
  
}
