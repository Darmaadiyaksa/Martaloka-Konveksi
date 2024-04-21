<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdPekerjaanJenis extends Model
{
  protected $guarded = ['id'];
  
  public function sub()
  {
    return $this->hasmany(MdPekerjaanJenisSub::class,'idjenis','id');
  }
  
  public function keberangkatan()
  {
    return $this->hasmany(SiswaKeberangkatan::class,'idjenispekerjaan','id');
  }
}
