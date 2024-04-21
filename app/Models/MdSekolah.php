<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdSekolah extends Model
{
  protected $guarded = ['id'];

  public function provinsi()
  {
    return $this->hasone(MdSekolahProvinsi::class,'id','idprov');
  }
}
