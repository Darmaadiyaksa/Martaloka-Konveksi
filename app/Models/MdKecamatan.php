<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdKecamatan extends Model
{
  protected $guarded = ['id'];

  public function kabupaten()
  {
    return $this->hasone(MdKabupaten::class,'id','idkab');
  }

}
