<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $guarded = ['id'];

  public function detil()
  {
    return $this->hasone(SiswaDetil::class,'idsiswa','id');
  }

  public function agama()
  {
    return $this->hasone(MdAgama::class,'id','idagama');
  }

  public function periode()
  {
    return $this->hasone(MdPeriode::class,'id','idperiode');
  }

  public function jk()
  {
    return $this->hasone(MdJk::class,'id','idjk');
  }

  public function keluarga()
  {
    return $this->hasmany(SiswaKeluarga::class,'idsiswa','id');
  }

  public function keluargajepang()
  {
    return $this->hasone(SiswaKeluargaJepang::class,'idsiswa','id');
  }

  public function pendidikan()
  {
    return $this->hasmany(SiswaPendidikan::class,'idsiswa','id');
  }

  public function pekerjaan()
  {
    return $this->hasmany(SiswaPekerjaan::class,'idsiswa','id');
  }

  public function sekolah()
  {
    return $this->hasone(MdSekolah::class,'id','idasalsekolah');
  }

  public function status()
  {
    return $this->hasone(MdSiswaStatus::class,'id','idstatus');
  }

  public function provinsi()
  {
    return $this->hasone(MdProvinsi::class,'id','idprov');
  }

  public function kabupaten()
  {
    return $this->hasone(MdKabupaten::class,'id','idkab');
  }

  public function interview()
  {
    return $this->hasmany(JobOrderDetil::class,'idsiswa','id');
  }

}
