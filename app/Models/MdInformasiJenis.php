<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdInformasiJenis extends Model
{
  protected $guarded = ['id'];

  public function blog()
  {
    return $this->hasmany(WebBlog::class,'idjenis','id')->where('status',1);
  }
}
