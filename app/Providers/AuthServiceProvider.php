<?php

namespace App\Providers;

use App\Models\BinhLuan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
        $this->registerPolicies();

       Gate::define('delete-post', function (User $user, BinhLuan $binh_luan) {
          return $user->id === $binh_luan->MaNguoiDung;
       });
       Gate::define('is-admin', function (User $user) {
          return $user->MaQuyen === 1;
       });
    }
}
