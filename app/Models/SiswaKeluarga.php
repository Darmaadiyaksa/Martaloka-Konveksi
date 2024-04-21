<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKeluarga extends Model
{
  protected $guarded = ['id'];

  public function hubungan()
  {
    return $this->hasone(MdKeluargaHubungan::class,'id','idhubungan');
  }

  public function pekerjaan()
  {
    return $this->hasone(MdPekerjaan::class,'id','idpekerjaan');
  }

  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }
}
