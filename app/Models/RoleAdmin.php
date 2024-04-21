<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
  protected $guarded = ['id'];

  public function role()
  {
    return $this->hasOne(RoleAdminNama::class, 'id','roleadmin');
  }

  public function user()
  {
    return $this->hasOne(User::class, 'id','iduser');
  }
}
