<?php

namespace App\Providers;
require_once('C:\laravel_projects\listing\app\Services\settingService.php');
use App\Services\serviceSetting;
use Illuminate\Support\ServiceProvider;



class settingServiceProvider extends ServiceProvider
{

    public function register()
    {
        //creating only one instance of the class serviceSetting through out the application .hence we cant create more than one instance 
        $this->app->singleton(serviceSetting::class, function () {
            return new serviceSetting();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $serviceSetting = $this->app->make(serviceSetting::class); //creating an instance of that class
        $serviceSetting->setGolbalSetting();
    }

    public static function clearSettings()
    {
        $serviceSetting = new serviceSetting;
        $serviceSetting->clearCache();
    }
}


