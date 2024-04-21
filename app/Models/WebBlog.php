<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebBlog extends Model
{
  protected $guarded = ['id'];

  public function jenis()
  {
    return $this->hasone(MdInformasiJenis::class,'id','idjenis');
  }
}
