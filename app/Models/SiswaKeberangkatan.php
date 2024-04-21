<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKeberangkatan extends Model
{
  protected $guarded = ['id'];

  public function bulan()
  {
    return $this->hasone(MdBulan::class,'id','idbulan');
  }

  public function siswa()
  {
    return $this->hasone(Siswa::class,'id','idsiswa');
  }

  public function perusahaan()
  {
    return $this->hasone(MdPerusahaan::class,'id','idperusahaan');
  }

  public function alamat()
  {
    return $this->hasone(MdPerusahaanAlamat::class,'id','idalamat');
  }

  public function jenispekerjaan()
  {
    return $this->hasone(MdPekerjaanJenis::class,'id','idjenispekerjaan');
  }

  public function subpekerjaan()
  {
    return $this->hasone(MdPekerjaanJenisSub::class,'id','idsubpekerjaan');
  }
}
