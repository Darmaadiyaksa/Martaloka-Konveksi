<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdPeriode extends Model
{
  protected $guarded = ['id'];

  public function bulan()
  {
    return $this->hasone(MdBulan::class,'id','idbulan');
  }
}
