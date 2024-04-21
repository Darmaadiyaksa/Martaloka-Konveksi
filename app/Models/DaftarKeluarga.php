<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarKeluarga extends Model
{
  protected $guarded = ['id'];

  public function daftar()
  {
    return $this->hasone(Daftar::class,'id','iddaftar');
  }

  public function pekerjaanayah()
  {
    return $this->hasone(MdPekerjaan::class,'id','idpekerjaanayah');
  }

  public function pekerjaanibu()
  {
    return $this->hasone(MdPekerjaan::class,'id','idpekerjaanibu');
  }

}
