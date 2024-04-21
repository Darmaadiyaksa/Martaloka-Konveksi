<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarDetil extends Model
{
  protected $guarded = ['id'];

  public function daftar()
  {
    return $this->hasone(Daftar::class,'id','iddaftar');
  }

  public function jeniscalon()
  {
    return $this->hasone(MdJenisCalon::class,'id','idjenis');
  }

  public function agama()
  {
    return $this->hasone(MdAgama::class,'id','idagama');
  }

  public function sekolah()
  {
    return $this->hasone(MdSekolah::class,'id','idasalsekolah');
  }

  public function kecamatan()
  {
    return $this->hasone(MdKecamatan::class,'id','idkecamatan');
  }

  public function wn()
  {
    return $this->hasone(Countries::class,'id','idwn');
  }

  public function jurusan()
  {
    return $this->hasone(MdSekolahJurusan::class,'id','idjurusan');
  }

}
