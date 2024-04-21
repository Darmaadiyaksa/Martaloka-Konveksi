<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaDetil extends Model
{
  protected $guarded = ['id'];

  
  public function goldarah()
  {
    return $this->hasone(MdGolonganDarah::class,'id','idgoldarah');
  }

  public function statuskawin()
  {
    return $this->hasone(MdStatusKawin::class,'id','idstatuskawin');
  }

  public function tangan()
  {
    return $this->hasone(MdTangan::class,'id','idtangan');
  }

  public function keunggulan()
  {
    return $this->hasone(MdKeunggulan::class,'id','idkeunggulan');
  }

  public function kekurangan()
  {
    return $this->hasone(Mdkekurangan::class,'id','idkekurangan');
  }


  public function hobi()
  {
    return $this->hasone(MdHobi::class,'id','idhobi');
  }

}
