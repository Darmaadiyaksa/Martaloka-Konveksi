<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
  protected $guarded = ['id'];

  public function perusahaan()
  {
    return $this->hasone(MdPerusahaan::class,'id','idperusahaan');
  }

  public function pic()
  {
    return $this->hasone(Pegawai::class,'id','idpic');
  }

  public function jenispekerjaan()
  {
    return $this->hasone(MdPekerjaanJenis::class,'id','idjenispekerjaan');
  }

  public function subpekerjaan()
  {
    return $this->hasone(MdPekerjaanJenisSub::class,'id','idsubpekerjaan');
  }

  public function detil()
  {
    return $this->hasmany(JobOrderDetil::class,'idjob','id');
  }

}
