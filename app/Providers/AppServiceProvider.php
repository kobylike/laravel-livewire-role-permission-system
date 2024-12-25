<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Map your models to their policies
        User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Global Super Admin Gate
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Define a Gate for deleting users
        Gate::define('delete-user', function (User $user, User $targetUser) {
            // Prevent Super Admins from being deleted
            if ($targetUser->hasRole('Super Admin')) {
                return false;
            }

            // Check if the user has permission to delete users
            return $user->hasPermissionTo('delete user');
        });
    }

    /**
     * Register policies for the application.
     */
    protected function registerPolicies(): void
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
