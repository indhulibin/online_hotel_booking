<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $all_subscribers = Subscriber::where('status',1)->get();
        return view('admin.subscriber_show',compact('all_subscribers'));
    }

    public function send_mail()
    {
        return view('admin.send_mail_to_subscriber_form');
    }

    public function send_mail_submision(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'subject'=>'required',
            'message' => 'required'
        ]);

         // Send email
         $subject = $request->subject;
         $message = $request->message;
         $subscriber_data = Subscriber::where('status',1)->get();
         foreach($subscriber_data as $item)
         {  
            \Mail::to($item->email)->send(new Websitemail($subject,$message));
         }       
         return redirect()->back()->with('success','Emails are sent successfully');
    }
}
