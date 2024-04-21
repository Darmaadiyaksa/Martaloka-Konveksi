<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdPerusahaan extends Model
{
  protected $guarded = ['id'];

  public function lembaga()
  {
    return $this->hasone(MdLembagaPengawas::class,'id','idlembaga');
  }

  public function alamat()
  {
    return $this->hasmany(MdPerusahaanAlamat::class,'idperusahaan','id');
  }

  public function keberangkatan()
  {
    return $this->hasmany(SiswaKeberangkatan::class,'idperusahaan','id');
  }
}
