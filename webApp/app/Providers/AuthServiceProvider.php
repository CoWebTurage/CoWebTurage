<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-review', function (User $user, Review $review) {
            $review->load('reviewer');
            return $user->id === $review->reviewer->id;
        });
        Gate::define('update-user', function (User $user, User $userToEdit) {
            return $user->id === $userToEdit->id;
        });
        Gate::define('update-trip', function (User $user, Trip $trip) {
            $trip->load('driver');
            return $user->id != $trip->driver->id;
        });
    }
}
