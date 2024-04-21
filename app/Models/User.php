<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'link',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pegawai()
    {
      return $this->hasOne(Pegawai::class, 'id','link');
    }

    public function daftar()
    {
      return $this->hasOne(Daftar::class, 'id','link');
    }

    public function siswa()
    {
      return $this->hasOne(Siswa::class, 'iddaftar','link');
    }

    public function orangtua()
    {
      return $this->hasOne(UserOrtu::class, 'iduser','id');
    }

    public function admin()
    {
      return $this->hasOne(RoleAdmin::class, 'iduser','id');
    }

    public function pejabat()
    {
      return $this->hasOne(RiwayatPejabat::class, 'idpegawai','link')->where('status',1);
    }

    public function userfinger()
    {
      return $this->hasmany(UserMesin::class, 'iduser','id');
    }

    public function userortu()
    {
      return $this->hasone(UserOrtu::class, 'iduser','id');
    }

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, role::class);
    }

    public function hasRole($role)
    {

        if (is_string($role)) {
            return $this->role->contains('id', $role);
        }

        return !! $this->roles->intersect($role)->count();
    }
}
