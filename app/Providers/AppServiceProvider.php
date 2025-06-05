<?php

namespace App\Providers;

use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\AuthService;
use App\Services\Interfaces\SettingServiceInterface;
use App\Services\SettingService;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\SettingRepository;

class AppServiceProvider extends ServiceProvider
{

    protected $providers = [
        AuthServiceInterface::class => AuthService::class,
        UserServiceInterface::class => UserService::class,
        UserRepositoryInterface::class => UserRepository::class,
        SettingServiceInterface::class => SettingService::class,
        SettingRepositoryInterface::class => SettingRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->providers as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
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
