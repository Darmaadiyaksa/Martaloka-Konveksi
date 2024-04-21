<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdLembagaPengawas extends Model
{
  protected $guarded = ['id'];

  public function perusahaan()
  {
    return $this->hasmany(MdPerusahaan::class,'idlembaga','id');
  }
}
