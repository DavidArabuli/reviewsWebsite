<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Model::preventLazyLoading();
        Paginator::defaultView('vendor.pagination.custom');

        // Gate::define('edit-review', function (User $user, Review $review) {

        //     return $review->author->user->is($user);
        // });
    }
}
