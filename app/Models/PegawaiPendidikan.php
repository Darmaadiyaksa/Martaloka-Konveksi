<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiPendidikan extends Model
{
  protected $guarded = ['id'];

  public function jenjang()
  {
    return $this->hasone(MdPendidikan::class,'id','idjenjang');
  }
  
  public function pegawai()
  {
    return $this->hasone(Pegawai::class,'id','idpegawai');
  }
}
