<?php

namespace App\Providers;

use App\Modules\Departments\Other\Providers\DepartmentServiceProvider;
use App\Modules\Documents\Other\Providers\DocumentServiceProvider;
use App\Modules\Employees\Other\Providers\EmployeeServiceProvider;
use App\Modules\Roles\Other\Providers\RoleServiceProvider;
use App\Modules\Users\Other\Providers\UserServiceProvider;
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
        $this->app->register(DepartmentServiceProvider::class);
        $this->app->register(EmployeeServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
        $this->app->register(DocumentServiceProvider::class);
        $this->app->register(RoleServiceProvider::class);
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
