<?php

// namespace App\Providers;
namespace ComminicationCraft\Pagemanagement;

use Illuminate\Support\ServiceProvider;

class pageManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // register our controller
        $this->app->make('ComminicationCraft\Pagemanagement\PageManagementController');

        // register our model
        $this->app->make('ComminicationCraft\Pagemanagement\Page');

        //register view page
        $this->loadViewsFrom(__DIR__.'/views', 'pageManagemnet-package');


        // publish asset for js/css/images
        $this->publishes([
            __DIR__.'/js' => public_path('/package/js'),
        ], 'public');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //register route file
        include __DIR__.'/routes.php';
      


    }
}
