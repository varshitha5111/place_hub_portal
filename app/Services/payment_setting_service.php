<?php

namespace App\Services;

use App\Models\payment_setting;
use App\Models\setting;
use Illuminate\Support\Facades\Cache;

class payment_setting_service
{
    public function setGolbalPaySetting()
    {
        $getPaySetting=$this->getPaySetting();
        config()->set('payment_setting', $getPaySetting);
    }

    public function getPaySetting()
    {
        return Cache::rememberForever('payment_setting',function(){
            return payment_setting::pluck('value','key')->toArray();
        });
    }

    public function clearCache()
    {
        Cache::forget('payment_setting');
    }

}


?>