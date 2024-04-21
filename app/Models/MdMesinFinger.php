<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdMesinFinger extends Model
{
  protected $guarded = ['id'];

  public function userfinger()
  {
    return $this->hasmany(UserMesin::class,'idmesin','id');
  }

  public function pegawai()
  {
    return $this->hasmany(UserMesin::class,'idmesin','id')->leftjoin('users','users.id','iduser')->wherein('role',[1,2]);
  }

  public function siswa()
  {
    return $this->hasmany(UserMesin::class,'idmesin','id')->leftjoin('users','users.id','iduser')->wherein('role',[3]);
  }

}
