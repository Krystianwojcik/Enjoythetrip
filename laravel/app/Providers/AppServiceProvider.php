<?php
/*
|--------------------------------------------------------------------------
| app/Providers/AppServiceProvider.php *** Copyright netprogs.pl | avaiable only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; /* Lecture 16 */
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /* Lecture 16 */
        View::composer('frontend.*', function ($view) {
            $view->with('placeholder', asset('images/placeholder.jpg'));
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* Lecture 13 */
        $this->app->bind(\App\Enjoythetrip\Interfaces\FrontendRepositoryInterface::class,function()
        {            
            return new \App\Enjoythetrip\Repositories\FrontendRepository;
        });
        
        $this->app->bind(\App\Enjoythetrip\Interfaces\BackendRepositoryInterface::class,function()
        {            
            return new \App\Enjoythetrip\Repositories\BackendRepository;
        });
    }
    

}

