<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class CustomerHomeController extends Controller
{
    public function index()
    {
        $total_completed_order = Order::where('status','completed')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        $total_pending_order = Order::where('status','pending')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        return view('customer.home',compact('total_completed_order','total_pending_order'));
    }
}
