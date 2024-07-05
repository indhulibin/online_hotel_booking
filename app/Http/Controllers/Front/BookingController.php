<?php

namespace App\Http\Controllers\Front;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BookedRoom;
use Auth;
use DateTime;
use DB;
use App\Mail\Websitemail;
use Stripe;



class BookingController extends Controller
{
    // public function booking_submit(Request $request)
    // {
    //     //Validation
    //     $request->validate([
    //         'room_id' => 'required',
    //         'checkin_checkout' => 'required',
    //         'adult' => 'required'
    //     ]);

    //     $dates = explode(' - ',$request->checkin_checkout);
    //     $checkin = $dates[0];
    //     $checkout = $dates[1];
        
       
    //     session()->push('cart_room_id',$request->room_id);
    //     session()->push('cart_checkin_date',$checkin);
    //     session()->push('cart_checkout_date',$checkout);
    //     session()->push('cart_adult',$request->adult);
    //     session()->push('cart_children',$request->children);
    //     return redirect()->route('cart_view')->with('success','Room is added to the cart successfully');
    // }

    public function booking_submit(Request $request)
{
    // Validation
    $request->validate([
        'room_id' => 'required',
        'checkin_checkout' => 'required',
        'adult' => 'required'
    ]);

    // Extract check-in and check-out dates
    $dates = explode(' - ', $request->checkin_checkout);
    $checkin = \DateTime::createFromFormat('d/m/Y', trim($dates[0]));
    $checkout = \DateTime::createFromFormat('d/m/Y', trim($dates[1]));

    // Get the total number of rooms for the selected room type
    $totalRooms = DB::table('rooms')->where('id', $request->room_id)->value('total_rooms');

    // Get session data
    $cartRoomIds = session()->get('cart_room_id', []);
    $cartCheckinDates = session()->get('cart_checkin_date', []);
    $cartCheckoutDates = session()->get('cart_checkout_date', []);

    // Initialize booking counts for each date
    $bookingCounts = [];

    // Create a period from check-in to check-out dates
    $period = new \DatePeriod($checkin, new \DateInterval('P1D'), $checkout->modify('+1 day'));
    foreach ($period as $date) {
        $formattedDate = $date->format('d/m/Y');
        $bookingCounts[$formattedDate] = 0;

        // Check the booking count in the session
        foreach ($cartRoomIds as $index => $cartRoomId) {
            if ($cartRoomId == $request->room_id) {
                $cartCheckin = \DateTime::createFromFormat('d/m/Y', $cartCheckinDates[$index]);
                $cartCheckout = \DateTime::createFromFormat('d/m/Y', $cartCheckoutDates[$index]);

                if ($date >= $cartCheckin && $date <= $cartCheckout) {
                    $bookingCounts[$formattedDate]++;
                }
            }
        }

        // Check if the room is fully booked for the date
        if ($bookingCounts[$formattedDate] >= $totalRooms) {
            $unavailableDates[] = $formattedDate;
        }
    }

    // Check if there are any unavailable dates
    if (!empty($unavailableDates)) {
        $errorMessage = 'The room is not available for the following dates: ' . implode(', ', $unavailableDates);
        return redirect()->route('home')->with('error', $errorMessage);
    }

   // Add booking details to session
   session()->push('cart_room_id', $request->room_id);
   session()->push('cart_checkin_date', $checkin->format('d/m/Y'));
   session()->push('cart_checkout_date', $checkout->format('d/m/Y'));
   session()->push('cart_adult', $request->adult);
   session()->push('cart_children', $request->children);

   // Redirect to cart view if booking is successful
   return redirect()->route('cart_view')->with('success', 'Room is added to the cart successfully');
}
    public function cart_view()
    {
        return view('front.cart');
    }

    public function cart_delete($id)
    {
        $arr_cart_room_id = array();
        $i =0;
        foreach (session()->get('cart_room_id') as  $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }

        $arr_cart_checkin_date = array();
        $i =0;
        foreach (session()->get('cart_checkin_date') as  $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }

        $arr_cart_checkout_date = array();
        $i =0;
        foreach (session()->get('cart_checkout_date') as  $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }

        $arr_cart_adult = array();
        $i =0;
        foreach (session()->get('cart_adult') as  $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }

        $arr_cart_children = array();
        $i =0;
        foreach (session()->get('cart_children') as  $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }
        
        session()->forget('cart_room_id');
        session()->forget('cart_checkin_date');
        session()->forget('cart_checkout_date');
        session()->forget('cart_adult');
        session()->forget('cart_children');

         
        for($i=0;$i<count($arr_cart_room_id);$i++)
        {
            if($arr_cart_room_id[$i] == $id)
            {
                continue;
            }
            else
            {
                session()->push('cart_room_id',$arr_cart_room_id[$i]);
                session()->push('cart_checkin_date', $arr_cart_checkin_date[$i]);
                session()->push('cart_checkout_date', $arr_cart_checkout_date[$i]);
                session()->push('cart_adult',$arr_cart_adult[$i]);
                session()->push('cart_children',$arr_cart_children[$i]);
            }
        }
        return redirect()->back()->with('success','Cart is deleted successfully');
    }

    public function check_out()
    {
        if(!Auth::guard('customer')->check())
        {
            return redirect()->back()->with('error','You must have to login order to checkout');
        }
        if(!session()->has('cart_room_id'))
        {
            return redirect()->back()->with('error','THERE IS NO CART ITEMS');
        }
        return view('front.checkOut');
    }

    public function payment(Request $request)
    {
        
        if(!Auth::guard('customer')->check())
        {
            return redirect()->back()->with('error','You must have to login order to checkout');
        }
        if(!session()->has('cart_room_id'))
        {
            return redirect()->back()->with('error','THERE IS NO CART ITEMS');
        }

         //Validation
         $request->validate([
            'billing_name' => 'required',
            'billing_email' => 'required',
            'billing_phone' => 'required',
            'billing_country' => 'required',
            'billing_address' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip' => 'required'
        ]);

        session()->put('billing_name',$request->billing_name);
        session()->put('billing_email', $request->billing_email);
        session()->put('billing_phone', $request->billing_phone);
        session()->put('billing_country',$request->billing_country);
        session()->put('billing_address',$request->billing_address);
        session()->put('billing_state',$request->billing_state);
        session()->put('billing_city',$request->billing_city);
        session()->put('billing_zip',$request->billing_zip);

        return view('front.payment');
    }


    public function paypal(Request $request, $total)
    {
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                 "return_url" => route('success'),
                 "cancel_url" => route('cancel')              
            ],
            "purchase_units" => [
              [
                "amount" => [
                  "currency_code" => "AUD",
                  "value" => $total
                ]
              ]
            ]
            ]);
            //dd($response);
            if(isset($response['id'])&& $response['id']!=null)
            {
                foreach($response['links'] as $link){
                    if($link['rel'] === 'approve')
                    {
                        session()->put('paid_amount',$total);
                        return redirect()->away($link['href']);
                    }
                }
            }else{
                return redirect()->route('cancel');
            }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        $order_no = time();
        $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
        $ai_id = $statement[0]->Auto_increment;

        //insert the customer and order details
        $obj = new Order();
        $obj->customer_id = Auth::guard('customer')->user()->id;
        $obj->order_no =  $order_no;
        $obj->transaction_id = $response['id'];
        $obj->payment_method ='Paypal';
        $obj->paid_amount = session()->get('paid_amount');
        $obj->booking_date = date('d/m/Y');
        $obj->status ='completed';
        $obj->save();

        $arr_cart_room_id = array();
        $i =0;
        foreach (session()->get('cart_room_id') as  $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }

        $arr_cart_checkin_date = array();
        $i =0;
        foreach (session()->get('cart_checkin_date') as  $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }

        $arr_cart_checkout_date = array();
        $i =0;
        foreach (session()->get('cart_checkout_date') as  $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }

        $arr_cart_adult = array();
        $i =0;
        foreach (session()->get('cart_adult') as  $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }

        $arr_cart_children = array();
        $i =0;
        foreach (session()->get('cart_children') as  $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }
       

        for($i=0;$i<count($arr_cart_room_id);$i++)
        {
            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
              // Convert date strings to DateTime objects
                    $checkinDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
                    $checkoutDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);

              // Calculate the difference in days
                    $interval = $checkinDate->diff($checkoutDate);
                    $nights = $interval->days;
                    $subtotal = $room_data->price * $nights;
            $obj = new OrderDetail();
            $obj->order_id =$ai_id;
            $obj->room_id = $arr_cart_room_id[$i];
            $obj->order_no = $order_no;
            $obj->check_in_date = $arr_cart_checkin_date[$i] ;
            $obj->check_out_date =  $arr_cart_checkout_date[$i] ;
            $obj->adult =  $arr_cart_adult[$i];
            $obj->children = $arr_cart_children[$i] ;
            $obj->subtotal = $subtotal;
            $obj->save();
        }
         // Send email
         $subject = 'New order';
         $message = 'You have made an order forhotel booking. The booking information given below: <br>';
         $message .= '<br>Order No: '.$order_no;
         $message .= '<br>Transaction Id: '.$response['id'];
         $message .= '<br>Payment Method: Paypal';
         $message .= '<br>Paid Amount: $'.session()->get('paid_amount');
         $message .= '<br>Booking Date: '.date('d/m/Y').'<br>';
        

         for($i=0;$i<count($arr_cart_room_id);$i++)
         {
            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
            $message .= '<br>Room Name: '.$room_data->name;
            $message .= '<br>Price per night: $'.$room_data->price;
            $message .= '<br>Checkin Date: '.$arr_cart_checkin_date[$i];
            $message .= '<br>Checkout Date: '.$arr_cart_checkout_date[$i];
            $message .= '<br>Children: '. $arr_cart_children[$i];
            $message .= '<br>Adult: '.$arr_cart_adult[$i].'<br>';
         }

            $customer_email =  Auth::guard('customer')->user()->email;
            \Mail::to($customer_email)->send(new Websitemail($subject,$message));

            session()->forget('paid_amount');
            session()->forget('cart_room_id');
            session()->forget('cart_checkin_date');
            session()->forget('cart_checkout_date');
            session()->forget('cart_adult');
            session()->forget('cart_children');
            session()->forget('billing_name',$request->billing_name);
            session()->forget('billing_email', $request->billing_email);
            session()->forget('billing_phone', $request->billing_phone);
            session()->forget('billing_country',$request->billing_country);
            session()->forget('billing_address',$request->billing_address);
            session()->forget('billing_state',$request->billing_state);
            session()->forget('billing_city',$request->billing_city);
            session()->forget('billing_zip',$request->billing_zip);
        return redirect()->route('customer_home')->with('success','Payment is successful');
        
    }

    public function cancel()
    {
        return redirect()->route('customer_home')->with('success','Payment is failed');
    }


    public function stripe(Request $request,$final_price)
    {
        $stripe_secret_key ='sk_test_51PQLDuLuT1HOFDi0j6gZPbnMmoJbF42s73Lmmibljz9aq1de8qc3XhRxl0Pn4miMDVR9S7ExV5GtE2zAP0YFtQj000dKFEHBDt';
        $cents = $final_price * 100;
        Stripe\Stripe::setApiKey($stripe_secret_key);
        $response = Stripe\Charge::create([
            "amount" => $cents,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => env('APP_NAME')
        ]);
        $responseJson = $response->jsonSerialize();
        // echo '<pre>';
        // print_r($responseJson);
        // echo '</pre>';
        // exit();
        $transcation_id = $responseJson['balance_transaction'];
        $last_4 = $responseJson['payment_method_details']['card']['last4'];

        $order_no = time();
        $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
        $ai_id = $statement[0]->Auto_increment;

        //insert the customer and order details
        $obj = new Order();
        $obj->customer_id = Auth::guard('customer')->user()->id;
        $obj->order_no =  $order_no;
        $obj->transaction_id = $transcation_id;
        $obj->payment_method ='Stripe';
        $obj->card_last_digit =$last_4;
        $obj->paid_amount = $final_price;
        $obj->booking_date = date('d/m/Y');
        $obj->status ='completed';
        $obj->save();

        $arr_cart_room_id = array();
        $i =0;
        foreach (session()->get('cart_room_id') as  $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }

        $arr_cart_checkin_date = array();
        $i =0;
        foreach (session()->get('cart_checkin_date') as  $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }

        $arr_cart_checkout_date = array();
        $i =0;
        foreach (session()->get('cart_checkout_date') as  $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }

        $arr_cart_adult = array();
        $i =0;
        foreach (session()->get('cart_adult') as  $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }

        $arr_cart_children = array();
        $i =0;
        foreach (session()->get('cart_children') as  $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }
       

        for($i=0;$i<count($arr_cart_room_id);$i++)
        {
            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
              // Convert date strings to DateTime objects
                    $checkinDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
                    $checkoutDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);

              // Calculate the difference in days
                    $interval = $checkinDate->diff($checkoutDate);
                    $nights = $interval->days;
                    $subtotal = $room_data->price * $nights;
            $obj = new OrderDetail();
            $obj->order_id =$ai_id;
            $obj->room_id = $arr_cart_room_id[$i];
            $obj->order_no = $order_no;
            $obj->check_in_date = $arr_cart_checkin_date[$i] ;
            $obj->check_out_date =  $arr_cart_checkout_date[$i] ;
            $obj->adult =  $arr_cart_adult[$i];
            $obj->children = $arr_cart_children[$i] ;
            $obj->subtotal = $subtotal;
            $obj->save();
        }
        for ($i = 0; $i < count($arr_cart_room_id); $i++) {
            $checkinDate = \DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
            $checkoutDate = \DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);
    
            // Check if dates were created successfully
            if ($checkinDate === false || $checkoutDate === false) {
                return redirect()->route('checkout')->with('error', 'Invalid date format.');
            }
    
            // Define the interval as one day
            $interval = new \DateInterval('P1D');
    
            // Create the date period, excluding the checkout date
            $datePeriod = new \DatePeriod($checkinDate, $interval, $checkoutDate);
    
            // Iterate over the period to get all dates excluding the checkout date
            foreach ($datePeriod as $date) {
                $obj = new BookedRoom();
                $obj->booking_date = $date->format('d/m/Y');
                $obj->room_id = $arr_cart_room_id[$i];
                $obj->order_no = $order_no;
                $obj->save();
            }
        }
         // Send email
         $subject = 'New order';
         $message = 'You have made an order forhotel booking. The booking information given below: <br>';
         $message .= '<br>Order No: '.$order_no;
         $message .= '<br>Transaction Id: '.$response['id'];
         $message .= '<br>Payment Method: Stripe';
         $message .= '<br>Paid Amount: $'.session()->get('paid_amount');
         $message .= '<br>Booking Date: '.date('d/m/Y').'<br>';
        

         for($i=0;$i<count($arr_cart_room_id);$i++)
         {
            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
            $message .= '<br>Room Name: '.$room_data->name;
            $message .= '<br>Price per night: $'.$room_data->price;
            $message .= '<br>Checkin Date: '.$arr_cart_checkin_date[$i];
            $message .= '<br>Checkout Date: '.$arr_cart_checkout_date[$i];
            $message .= '<br>Children: '. $arr_cart_children[$i];
            $message .= '<br>Adult: '.$arr_cart_adult[$i].'<br>';
         }

            $customer_email =  Auth::guard('customer')->user()->email;
            \Mail::to($customer_email)->send(new Websitemail($subject,$message));

            session()->forget('paid_amount');
            session()->forget('cart_room_id');
            session()->forget('cart_checkin_date');
            session()->forget('cart_checkout_date');
            session()->forget('cart_adult');
            session()->forget('cart_children');
            session()->forget('billing_name',$request->billing_name);
            session()->forget('billing_email', $request->billing_email);
            session()->forget('billing_phone', $request->billing_phone);
            session()->forget('billing_country',$request->billing_country);
            session()->forget('billing_address',$request->billing_address);
            session()->forget('billing_state',$request->billing_state);
            session()->forget('billing_city',$request->billing_city);
            session()->forget('billing_zip',$request->billing_zip);
        return redirect()->route('customer_home')->with('success','Payment is successful');
    }
}
