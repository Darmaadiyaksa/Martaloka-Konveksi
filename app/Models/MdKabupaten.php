<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdKabupaten extends Model
{
  protected $guarded = ['id'];

  public function provinsi()
  {
    return $this->hasone(MdProvinsi::class,'id','idprov');
  }

}
