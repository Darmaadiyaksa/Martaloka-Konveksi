<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
  protected $guarded = ['id'];

  public function detil()
  {
    return $this->hasone(DaftarDetil::class,'iddaftar','id');
  }

  public function keluarga()
  {
    return $this->hasone(DaftarKeluarga::class,'iddaftar','id');
  }

  public function pekerjaan()
  {
    return $this->hasone(DaftarPekerjaan::class,'iddaftar','id');
  }
  
}
