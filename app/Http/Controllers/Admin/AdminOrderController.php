<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders',compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::where('id',$id)->first();
        $order_details = OrderDetail::where('order_id',$id)->get();
        $custmer_data = Customer::where('id',$order->customer_id)->first();
        return view('admin.invoice',compact('order','order_details','custmer_data'));
    }

    public function delete($id)
    {
        $delete_order_data = Order::where('id',$id)->delete();
        $order_details = OrderDetail::where('order_id',$id)->delete();
        return redirect()->back()->with('success','Orders is deleted successfully');
    }
}
