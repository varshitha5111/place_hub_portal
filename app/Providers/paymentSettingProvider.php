<?php

namespace App\Providers;
require_once('C:\laravel_projects\listing\app\Services\payment_setting_service.php');
use App\Services\payment_setting_service;
use Illuminate\Support\ServiceProvider;

class paymentSettingProvider extends ServiceProvider
{

    public function register()
    {
        //creating only one instance of the class serviceSetting through out the application .hence we cant create more than one instance 
        $this->app->singleton(payment_setting_service::class, function () {
            return new payment_setting_service();
        });
    }

    public function boot()
    {
        $serviceSetting = $this->app->make(payment_setting_service::class); //creating an instance of that class
        $serviceSetting->setGolbalPaySetting();
    }

    public static function clearSettings()
    {
        $serviceSetting = new payment_setting_service;
        $serviceSetting->clearCache();
    }

}


?>