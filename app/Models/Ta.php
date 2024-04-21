<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ta extends Model
{
  protected $guarded = ['id'];

    public function mahasiswa_active()
    {
        return $this->hasMany(Mahasiswa::class, 'idta', 'id')->where('idstatus', 3);
    }

    public function kuesioner_kip()
    {
        return $this->hasOne(KuesionerKipJawaban::class, 'idta', 'id');
    }
}
