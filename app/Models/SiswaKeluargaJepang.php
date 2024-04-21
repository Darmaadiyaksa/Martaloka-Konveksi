<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKeluargaJepang extends Model
{
  protected $guarded = ['id'];

  public function hubungan()
  {
    return $this->hasone(MdKeluargaHubungan::class,'id','idhubungan');
  }

  public function perfektur()
  {
    return $this->hasone(MdPerfektur::class,'id','idperfektur');
  }

  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }
}
