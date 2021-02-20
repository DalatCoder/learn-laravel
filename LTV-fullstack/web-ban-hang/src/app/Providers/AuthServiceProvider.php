<?php

namespace App\Providers;

use App\Category;
use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use function foo\func;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('category-list', CategoryPolicy::class . '@viewAny');
        Gate::define('category-create', CategoryPolicy::class . '@create');
        Gate::define('category-edit', CategoryPolicy::class . '@update');
        Gate::define('category-delete', CategoryPolicy::class . '@delete');

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permission.access.list-menu'));
        });
    }
}
