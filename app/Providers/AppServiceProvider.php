<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $cloudinaryConfig = config('cloudinary');
        \Cloudinary\Configuration\Configuration::instance([
            'cloud' => [
                'cloud_name' => $cloudinaryConfig['cloud_name'],
                'api_key' => $cloudinaryConfig['api_key'],
                'api_secret' => $cloudinaryConfig['api_secret']
            ],
            'url' => [
                'secure' => $cloudinaryConfig['secure']
            ]
        ]);
    }
}
