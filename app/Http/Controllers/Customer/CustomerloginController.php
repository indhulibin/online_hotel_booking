<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Auth;
use Hash;

class CustomerloginController extends Controller
{
    public function index()
    {
        return view('front.login');
    }

    public function loginSubmit(Request $request)
    {
        //Validation
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            
            $credential =[
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1
            ];
            if(Auth::guard('customer')->attempt( $credential))
            {
                // $customer = Auth::guard('customer')->user();

                //         // Check the status of the customer
                //         if ($customer->status == 0) {
                //             // Log the customer out if their status is 0
                //             Auth::guard('customer')->logout();

                //             return redirect()->route('customer_login')->with('error', 'Please check your email and click on the link for verification.');
                //         }
                return redirect()->route('customer_home');
            }
            else 
            {
                return redirect()->route('customer_login')->with('error','Invalid email or password');
            }
            
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        //Validation
        $request->validate([
            'email' => 'required|email',
        ]);
        
       $customer_data = Customer::where('email',$request->email)->where('status',1)->first();

       //check the email exist here or not

       if(!$customer_data)
       {
          return redirect()->back()->with('error','This email is not found');
       }
       else
       {
            $token = hash('sha256',time());
            $customer_data->token =  $token;
            $customer_data->update();
 
            $rest_link = url('reset-password/'.$token.'/'.$request->email);
            $subject = "Reset password";
            $message = "Click on the following link:<br>";
            $message .= '<a href="'.$rest_link.'">Click here</a>';
 
            \Mail::to($request->email)->send(new Websitemail($subject,$message));
 
            return redirect()->route('customer_login')->with('success','Please check your email and follow the steps there');
       }
       
    }

    public function reset_password($token,$email)
    {
        $customer_data = Customer::where('token',$token)->where('email',$email)->first();
        if(!$customer_data)
        {
            return redirect()->route('customer_login');
        }
        return view('front.reset_password',compact('token','email'));
    }

    public function rest_password_submit(Request $request)
    {
        //validation

        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        //new password encript
            $new_password = Hash::make($request->password);
        //Fetch the Admin data
            $custmer_data = Customer::where('token',$request->token)->where('email',$request->email)->first();
        //update the password and token
            $custmer_data->password = $new_password;
            $custmer_data->token = '';
            $custmer_data->update();
        //redirct
            return redirect()->route('customer_login')->with('success','Password reset successfully');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }


    public function signup()
    {
        return view("front.signup");
    }
    public function signupSubmit(Request $request)
    {
        //Validation
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $token = hash('sha256',time());
            $password = Hash::make($request->password);

            $verificationLink = url('/signup/verify/'.$request->email.'/'.$token);

            $obj = new Customer();
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->password = $password;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            $subject = 'Singn Up Verification';
            $message = 'Please click on the link below to confirm the email verification: <br>';
            $message .= '<a href="'.$verificationLink.'">';
            $message .= $verificationLink;
            $message .=  '</a>';

            \Mail::to($request->email)->send(new Websitemail($subject,$message));


            return redirect()->back()->with('success','registation completed,please check your email and click on the link for the verification');
    }

    public function verify($email,$token)
    {
        
        $data = Customer::where('email',$email)->where('token',$token)->where('status',0)->first();
        if($data)
        {
            $data->token = '';
            $data->status = 1;
            $data->update();
            return redirect()->route('customer_login')->with('success','Your email is verified successfully');
        }
        else{
            return redirect()->route('customer_login')->with('error','Time out');
        }

    }
}
