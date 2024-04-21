<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKk extends Model
{
  protected $guarded = ['id'];

  public function anggota()
  {
    return $this->hasmany(SiswaKkAnggota::class,'idkk','id');
  }

  public function kepalakeluarga()
  {
    return $this->hasone(SiswaKkAnggota::class,'idkk','id')->where('idhubungan',1);
  }

  public function desa()
  {
    return $this->hasone(MdDesa::class,'id','iddesa');
  }

  public function provinsi()
  {
    return $this->hasone(MdProvinsi::class,'id','idprov');
  }

  public function kabupaten()
  {
    return $this->hasone(MdKabupaten::class,'id','idkab');
  }

  public function kecamatan()
  {
    return $this->hasone(MdKecamatan::class,'id','idkec');
  }

  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }
}
