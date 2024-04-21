<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdSekolahProvinsi extends Model
{
  protected $guarded = ['id'];

  public function sekolah()
  {
    return $this->hasmany(MdSekolah::class,'idprov','id');
  }

}
