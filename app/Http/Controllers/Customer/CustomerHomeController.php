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
        // $total_completed_order = Order::where('status','completed')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        // $total_pending_order = Order::where('status','pending')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        // return view('customer.home',compact('total_completed_order','total_pending_order'));

        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return redirect()->route('customer_login')->with('error', 'You need to login first.');
        }

        $total_completed_order = Order::where('status', 'completed')
            ->where('customer_id', $customer->id)
            ->count();

        $total_pending_order = Order::where('status', 'pending')
            ->where('customer_id', $customer->id)
            ->count();

        return view('customer.home', compact('total_completed_order', 'total_pending_order'));
    }
}
