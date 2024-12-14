<?php

namespace App\Http\Controllers\admin;
require_once('C:\laravel_projects\listing\app\Services\settingService.php');
use App\Services\serviceSetting;
use App\Http\Controllers\Controller;
use App\Models\setting;
use App\Providers\settingServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class settingController extends Controller
{
    public function index()
    {
        $settings=[
            'id'=>'',
            'icon'=>'',
            'name'=>'',
            'email'=>'',
            'phone'=>'',
            'currency'=>'',
            'country'=>'',
            'position'=>''
        ];
        if(config('settings')){
        foreach (config('settings') as $settings)
            return view('admin.setting.index', compact('settings'));
        }
        else{
            return  view('admin.setting.index', compact('settings'));
        }
    }

    public function create(Request $r)
    {
        // echo "hello";
        $validateData = $r->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'country' => 'required',
            'currency' => 'required',
            'icon' => 'required',
            'position' => 'required'
        ]);
        setting::updateOrCreate(
            ['id' => 1],
            [
                'id' => 1,
                'name' => $r->name,
                'email' => $r->email,
                'phone' => $r->phone,
                'country' => $r->country,
                'currency' => $r->currency,
                'icon' => $r->icon,
                'position' => $r->position
            ]
        );
        $serviceSetting = app(serviceSetting::class); //creating an instance of that class
        $serviceSetting->clearCache();

        return redirect()->route('admin.setting.index');
    }

    public function pusher_create(Request $r){
        setting::updateOrCreate(
            ['id' => 2],
            [
                'pusher_app_id' => $r->pusher_app_id,
                'pusher_app_key' => $r->pusher_app_key,
                'pusher_app_secret' => $r->pusher_app_secret,
                'pusher_app_cluster' => $r->pusher_app_cluster,
            ]
        );
        $serviceSetting = app(serviceSetting::class); //creating an instance of that class
        $serviceSetting->clearCache();

        return redirect()->route('admin.setting.index');
    }
}
