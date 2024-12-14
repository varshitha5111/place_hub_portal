<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $subscriptions = subscription::withTrashed()->with('packages')
            ->where('user_id', auth()->user()->id)->first();
        foreach(config('settings') as $setting)
        return view('frontend.dashboard.index',compact('setting','subscriptions'));
    }
}
