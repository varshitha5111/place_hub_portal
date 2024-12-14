<?php

namespace App\Http\Controllers\frontend;

use App\DataTables\UserOrderDataTable;
use App\Events\createOrder;
use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\package;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function orderPayment($pack_id, Request $r)
    {
        $r->validate([
            'transaction_id' => 'required'
        ]);
        $packages = package::find($pack_id);
        $orderDetails = [
            'transaction_id' => $r->transaction_id,
            'package_id' => $pack_id,
            'base_amount' => $packages->price,
            'paid_amount' => $packages->price,
        ];
        createOrder::dispatch($orderDetails);
        return redirect()->back();
    }

    public function index(UserOrderDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.orders.index');
    }

    public function viewDetails($id)
    {
        $orders = new order();
        $orders = $orders->select('*')->where('id', $id)->first();
        return view('frontend.dashboard.orders.viewDetails', compact('orders'));
    }
}
