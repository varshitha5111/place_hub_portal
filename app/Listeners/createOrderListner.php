<?php

namespace App\Listeners;

use App\Events\createOrder;
use App\Models\order;
use App\Models\subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class createOrderListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(createOrder $event)
    {
        $orders = new order();
        $orders->user_id = auth()->user()->id;
        $orders->transaction_id = $event->orderDetails['transaction_id'];
        $orders->payment_status = 'success';
        $orders->payment_mode = 'upi';
        $orders->package_id = $event->orderDetails['package_id'];
        $orders->paid_amount = $event->orderDetails['paid_amount'];
        $orders->base_amount = $event->orderDetails['base_amount'];
        $orders->paid_currency = 'INR';
        foreach (config('settings') as $setting)
            $orders->base_currency = $setting->currency;
        $orders->save();

        if ($orders->payment_status === 'success') {
            subscription::withTrashed()->with('packages')->updateOrCreate(
                ['id' => auth()->user()->id],
                [
                    'user_id' => auth()->user()->id,
                    'package_id' => $event->orderDetails['package_id'],
                    'order_id' => $orders->id
                ]
            );
        }
    }
}
