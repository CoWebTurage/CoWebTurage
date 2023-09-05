<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
            return $user->id === $review->reviewer()->id;
        });
        Gate::define('update-user', function (User $user, User $userToEdit) {
            return $user->id === $userToEdit->id;
        });
    }
}
