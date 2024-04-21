<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPendidikan extends Model
{
  protected $guarded = ['id'];

  public function jenjang()
  {
    return $this->hasone(MdPendidikan::class,'id','idjenjang');
  }
  
  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }
}
