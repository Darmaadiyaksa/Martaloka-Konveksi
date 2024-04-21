<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKkAnggota extends Model
{
  protected $guarded = ['id'];

  public function agama()
  {
    return $this->hasone(MdAgama::class,'id','idagama');
  }

  public function hubungan()
  {
    return $this->hasone(MdKeluargaHubunganKk::class,'id','idhubungan');
  }

  public function jk()
  {
    return $this->hasone(MdJk::class,'id','idjk');
  }

  public function pekerjaan()
  {
    return $this->hasone(MdPekerjaan::class,'id','idpekerjaan');
  }

  public function pendidikan()
  {
    return $this->hasone(MdPendidikan::class,'id','idpendidikan');
  }
  
  public function goldarah()
  {
    return $this->hasone(MdGolonganDarah::class,'id','idgoldarah');
  }

  public function statuskawin()
  {
    return $this->hasone(MdStatusKawin::class,'id','idstatuskawin');
  }

  public function wn()
  {
    return $this->hasone(Countries::class,'id','idwn');
  }
}
