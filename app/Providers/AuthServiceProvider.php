<?php

namespace App\Providers;

use App\Models\RiwayatPejabat;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      Gate::define('pegawai', function ($user) {
        if (Auth::user()->role == 1) {
          return true;
        }
      });

      Gate::define('guru', function ($user) {
        if (Auth::user()->role == 2) {
          return true;
        }
      });

      Gate::define('calon', function ($user) {
        if (Auth::user()->role == 3) {
          if (Auth::user()->daftar != null && Auth::user()->siswa == null) {
            return true;
          }
        }
      });

      Gate::define('siswa', function ($user) {
        if (Auth::user()->role == 3) {
          if (Auth::user()->siswa != null) {
            return true;
          }
        }
      });

      Gate::define('admin', function ($user) {
        if (in_array(Auth::user()->role,[1,2])) {
          if (auth::user()->admin != null) {
            return true;
          }
        }
      });

      Gate::define('adminakademik', function ($user) {
        if (auth::user()->admin != null) {
          if (in_array(auth::user()->admin->roleadmin,[1,3])) {
            return true;
          }
        }
      });

      Gate::define('adminkeuangan', function ($user) {
        if (auth::user()->admin != null) {
          if (in_array(auth::user()->admin->roleadmin,[2,3])) {
            return true;
          }
        }
      });

      Gate::define('superadmin', function ($user) {
        if (auth::user()->admin != null) {
          if (auth::user()->admin->roleadmin == 3) {
            return true;
          }
        }
      });

      Gate::define('masterdata', function ($user) {
        if (auth::user()->admin != null) {
          return true;
        }
      });

      $this->registerPolicies();
    }
}
