<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Listeners\SendPostNotification;
use App\Models\Comment;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
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
        Route::pattern('id', '[0-9]+');
        Paginator::useBootstrapFour();

        // Policies
        Gate::policies([
            Post::class => PostPolicy::class,
            Comment::class => CommentPolicy::class,
        ]);

        /* Event::listen( */
        /* PostCreated::class, */
        /* SendPostNotification::class, */
        /* ); */
    }
}
