<?php

namespace App\Modules\Roles\Other\Providers;

use App\Modules\Roles\Data\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
