<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMesin extends Model
{
  protected $guarded = ['id'];

  public function mesin()
  {
    return $this->hasone(MdMesinFinger::class,'id','idmesin');
  }

  public function user()
  {
    return $this->hasone(User::class,'id','iduser');
  }

  public function pegawai()
  {
    return $this->hasone(User::class,'id','iduser')->wherein('role',[1,2]);
  }

  public function siswa()
  {
    return $this->hasone(User::class,'id','iduser')->wherein('role',[3]);
  }


}
