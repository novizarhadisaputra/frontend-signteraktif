<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\HomeRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\BillingRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RolePermissionRepository;
use App\Repositories\API\AuthRepository as ApiAuthRepository;
use App\Repositories\API\FirebaseRepository as ApiFirebaseRepository;
use App\Repositories\API\PartnerRepository as ApiPartnerRepository;
use App\Repositories\API\ScheduleRepository as APIScheduleRepository;
use App\Repositories\API\TransactionRepository as ApiTransactionRepository;
use App\Repositories\API\UserRepository as ApiUserRepository;
use App\Repositories\GoogleRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('repo.auth', AuthRepository::class);
        $this->app->bind('repo.billing', BillingRepository::class);
        $this->app->bind('repo.google', GoogleRepository::class);
        $this->app->bind('repo.home', HomeRepository::class);
        $this->app->bind('repo.news', NewsRepository::class);
        $this->app->bind('repo.notification', NotificationRepository::class);
        $this->app->bind('repo.partners', PartnerRepository::class);
        $this->app->bind('repo.setting', SettingRepository::class);
        $this->app->bind('repo.schedule', ScheduleRepository::class);
        $this->app->bind('repo.role', RoleRepository::class);
        $this->app->bind('repo.permission', PermissionRepository::class);
        $this->app->bind('repo.transaction', TransactionRepository::class);
        $this->app->bind('repo.role.permission', RolePermissionRepository::class);
        $this->app->bind('repo.users', UserRepository::class);
        $this->app->bind('repo.api.auth', ApiAuthRepository::class);
        $this->app->bind('repo.api.firebase', ApiFirebaseRepository::class);
        $this->app->bind('repo.api.partners', ApiPartnerRepository::class);
        $this->app->bind('repo.api.transactions', ApiTransactionRepository::class);
        $this->app->bind('repo.api.user', ApiUserRepository::class);
        $this->app->bind('repo.api.schedule', APIScheduleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
