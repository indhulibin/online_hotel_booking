<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_completed_orders = Order::where('status','completed')->count();
        $total_pending_orders = Order::where('status','pending')->count();
        $total_active_customer = Customer::where('status',1)->count();
        return view('admin.home',compact('total_completed_orders','total_pending_orders','total_active_customer'));
    }
}
