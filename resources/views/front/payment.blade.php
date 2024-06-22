@extends('front.layout.app')
@section('main_content')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->checkout_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-lg-4 col-md-4 checkout-left mb_30">
                @php
                         $total =0;
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

                @endphp
                                @for($i=0;$i<count($arr_cart_room_id);$i++)
                                    @php
                                            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                    
                                            // Convert date strings to DateTime objects
                                                $checkinDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
                                                $checkoutDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);

                                            // Calculate the difference in days
                                                $interval = $checkinDate->diff($checkoutDate);
                                                $nights = $interval->days;
                                                $subtotal = $room_data->price * $nights;
                                                //echo "$".$subtotal;
                
                                                $total = $total+$subtotal;
                                    @endphp
                                @endfor
                            
                
                <h4>Make Payment</h4>
                <select name="payment_method" class=" select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Select Payment Method</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Stripe">Stripe</option>
                </select>

                <div class="paypal mt_20">
                    <h4>Pay with PayPal</h4>
                    <form method="post" action="{{ route('paypal',$total) }}">
                        @csrf
                        <button type="submit" id="paypal-button">Paypal</button>
                    </form>
                </div>

                <div class="stripe mt_20">
                    <h4>Pay with Stripe</h4>
                    @php
                        $cents = $total*100;
                        $customer_email=Auth::guard('customer')->user()->email;
                        $stripe_publishable_key = 'pk_test_51PQLDuLuT1HOFDi0Gi3JeuS917gXfiWbJtoODqxqfxqTkD8Pars1IW0kQJ5beE42f5DZ4Oc6bdyIBVLbbrx28JAq00g88qtIrq';
                    @endphp
                    <form action="{{ route('stripe',$total) }}" method="POST">
                        @csrf
                        <script src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="{{ $stripe_publishable_key }}"
                            data-amount="{{ $cents }}"
                            data-name="{{ env('APP_NAME') }}"
                            data-description=""
                            data-image="{{ asset('stripe.png') }}"
                            data-currency="usd"
                            data-email="{{ $customer_email }}">
                        </script>
                    </form>
                </div>

            </div>
            @php
                         $total =0;
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

                    @endphp
            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Billing Details</h4>
                    <div>Name  : {{ session()->get('billing_name')  }}</div>
                    <div>Email : {{ session()->get('billing_email') }}</div>
                    <div>Phone  :{{ session()->get('billing_phone') }}</div>
                    <div>Country :{{ session()->get('billing_country') }}</div>
                    <div>Address  :{{ session()->get('billing_address') }}</div>
                    <div>State :{{ session()->get('billing_state') }}</div>
                    <div>City  :{{ session()->get('billing_city') }}</div>
                    <div>Zip  :{{ session()->get('billing_zip') }}</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @for($i=0;$i<count($arr_cart_room_id);$i++)
                                    @php
                                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                    @endphp
                                <tr>
                                    <td>
                                        {{  $room_data->name }}
                                        <br>
                                        ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                        <br>
                                        Adult: {{ $arr_cart_adult[$i] }}, Children:
                                        @if(isset($arr_cart_children[$i]) && $arr_cart_children[$i] != '')
                                        {{ $arr_cart_children[$i] }}
                                        @else
                                        0
                                        @endif
                                    </td>

                                    <td class="p_price">
                                        @php
                                            // Convert date strings to DateTime objects
                                                $checkinDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
                                                $checkoutDate = DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);

                                            // Calculate the difference in days
                                                $interval = $checkinDate->diff($checkoutDate);
                                                $nights = $interval->days;
                                                $subtotal = $room_data->price * $nights;
                                                echo "$".$subtotal;
                
                                                $total = $total+$subtotal;
                                        @endphp
                                        
                                    </td>
                                </tr>
                                @endfor
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>${{ $total }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection