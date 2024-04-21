<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrderDetil extends Model
{
  protected $guarded = ['id'];

  public function joborder()
  {
    return $this->hasone(JobOrder::class,'id','idjob');
  }

  public function jobaktif()
  {
    return $this->hasone(JobOrder::class,'id','idjob')->where('status',1);
  }

  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }

}
