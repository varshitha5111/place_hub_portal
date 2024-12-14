<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment_setting;
use App\Services\payment_setting_service;
use Illuminate\Http\Request;

class paymentSettingController extends Controller
{
    public function index()
    {
        // var_dump(config('payment_setting'));
        foreach (config('settings') as $setting)
            return view('admin.payment_setting.index', compact('setting'));
    }

    public function create(Request $r)
    {
        $validate_data = $r->validate([
            'status' => ['required','in:1,0'],
            'mode' => ['required','in:sandBox,live'],
            'country' => 'required',
            'currency' => 'required',
            'rate' => 'required',
            'client_id' => 'required',
            'secret_key' => 'required',
            'app_key' => 'required',
        ]);
        $i=1;

        foreach ($validate_data as $key => $value) {
            payment_setting::updateOrCreate(
                ['id'=>$i],
                [
                    'key'=>$key,
                    'value'=>$value
                ]
                );
                $i=$i+1;
        }
        $payment_setting=app(payment_setting_service::class);
        $payment_setting->clearCache();
        return redirect()->back();

    }
}
