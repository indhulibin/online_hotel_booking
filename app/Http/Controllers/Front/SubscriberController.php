<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Hash;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $token = hash('sha256',time());

            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            // Send email

            $verificationLink = url('/subscriber/verify/'.$request->email.'/'.$token);


            $subject = 'Subscriber Verification';
            $message = 'Please click on the link below to onfirm the subscription: <br>';
            $message .= '<a href="'.$verificationLink.'">';
            $message .= $verificationLink;
            $message .=  '</a>';

            \Mail::to($request->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Please check your email to comfirm your subscription']);
        }
        
    }

    public function verify($email,$token)
    {
        $data = Subscriber::where('email',$email)->where('token',$token)->first();
        if($data)
        {
            $data->token = '';
            $data->status = 1;
            $data->update();
            return redirect()->route('home')->with('success','Your subcription is verified successfully');
        }
        else{
            return redirect()->route('home');
        }

    }
}
