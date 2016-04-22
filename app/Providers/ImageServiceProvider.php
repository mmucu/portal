<?php

namespace churchapp\Providers;

use Illuminate\Support\ServiceProvider;
use churchapp\imaging\ImageMaker;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    protected $defer = true;

    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('churchapp\imaging\ImageProcessorContract', function() {

            return new ImageMaker();
        });
    }

    public function provides(){

        return ['churchapp\imaging\ImageProcessorContract'];
    }

}
