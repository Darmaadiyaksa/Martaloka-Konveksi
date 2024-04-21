<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiDetil extends Model
{
  protected $guarded = ['id'];

  public function pegawai()
  {
    return $this->hasone(Pegawai::class,'id','idpegawai');
  }

  public function statuskawin()
  {
    return $this->hasone(MdStatusKawin::class,'id','idstatuskawin');
  }

}
