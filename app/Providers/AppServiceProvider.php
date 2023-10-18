<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\NotificationsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Register the view composer for a layout or specific view
        view()->composer(["dashboard.partials._menu", "dashboard.users-notifications"], NotificationsComposer::class);

        Paginator::defaultView("dashboard.pagination.pagination");
 
        Paginator::defaultSimpleView("dashboard.pagination.pagination");
        Paginator::useBootstrapFive();
    }
}
