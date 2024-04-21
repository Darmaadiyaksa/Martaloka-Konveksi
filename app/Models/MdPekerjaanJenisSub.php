<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdPekerjaanJenisSub extends Model
{
  protected $guarded = ['id'];

  public function jenis()
  {
    return $this->hasone(MdPekerjaanJenis::class,'id','idjenis');
  }
    
  public function keberangkatan()
  {
    return $this->hasmany(SiswaKeberangkatan::class,'idsubpekerjaan','id');
  }
}
