<?php

namespace App\Http\Controllers\admin;

use App\DataTables\orderDataTable;
use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

use function Termwind\render;

class orderController extends Controller
{
    public function index(orderDataTable $dataTable){
        return $dataTable->render('admin.orders.index');
    }

    public function viewDetails($order_id){
        $orders=new order();
        $orders=$orders->select('*')->where('id',$order_id)->first();
        return view('admin.orders.viewDetails',compact('orders'));
    }

    public function edit(Request $r,$id){
        $orders=new order();
        $orders=$orders->where('id',$id)->first();
        $orders->payment_status=$r->status;
        $orders->save();
        $orders=$orders->select('*')->where('id',$id)->first();
        return $this->viewDetails($id);
    }
}
