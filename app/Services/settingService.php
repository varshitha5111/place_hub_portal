<?php

namespace App\Services;

use App\Models\setting;
use Illuminate\Support\Facades\Cache;

class serviceSetting
{
    function setGolbalSetting()
    {
        $settings = $this->getSetting();
        config()->set('settings', $settings);
    }

    public function getSetting()
    {
        return Cache::rememberForever('settings', function () {
            return setting::select('*')->get();
        });
    }

    function clearCache()
    {
        // echo "cache";
        Cache::forget('settings');
    }
}
