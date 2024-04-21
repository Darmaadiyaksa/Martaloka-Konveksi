<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPekerjaan extends Model
{
  protected $guarded = ['id'];

  public function bidang()
  {
    return $this->hasone(MdPekerjaanJenis::class,'id','idbidang');
  }

  public function bulanmulai()
  {
    return $this->hasone(MdBulan::class,'id','idbulanmulai');
  }

  public function bulanselesai()
  {
    return $this->hasone(MdBulan::class,'id','idbulanselesai');
  }
  
  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }
}
