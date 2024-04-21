<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalenderKegiatan extends Model
{
  protected $guarded = ['id'];

  public function kantor()
  {
    return $this->hasone(MdKantor::class,'id','idkantor');
  }

  public function jenis()
  {
    return $this->hasone(MdKegiatanJenis::class,'id','idjenis');
  }

}
