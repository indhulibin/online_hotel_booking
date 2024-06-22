<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $cutomers  = Customer::orderBy('name', 'asc')->get();
        return view('admin.customers_view',compact('cutomers'));
    }

    public function statusChange($customer_id)
    {
        $cutomers  = Customer::where('id',$customer_id)->first();

        if($cutomers->status==1)
        {
            $cutomers->status= 0;
        }
        else
        {
            $cutomers->status = 1;
            $cutomers->token='';
        }
        $cutomers->update();
        return redirect()->back()->with('success','Successfuly changed your status');
    }
    
}
