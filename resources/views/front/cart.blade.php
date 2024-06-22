@extends('front.layout.app')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->cart_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
               @if(session()->has('cart_room_id'))
                <div class="table-responsive">
                    <table class="table table-bordered table-cart">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Serial</th>
                                <th>Photo</th>
                                <th>Room Info</th>
                                <th>Price/Night</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Guests</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
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
                
                                for($i=0;$i<count($arr_cart_room_id);$i++)
                                {
                                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                    
                            @endphp
                            
                           
                                <tr>
                                    <td>
                                        <a href="{{ route('cart_delete',$arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td> <img src="{{ asset('uploads/'.$room_data->featured_photo) }}"> </td>
                                    <td>
                                        <a href="{{ route('room',$room_data->id) }}" class="room-name">{{  $room_data->name }}</a>
                                    </td>
                                    <td>${{ $room_data->price }}</td>
                                    <td>{{ $arr_cart_checkin_date[$i] }}</td>
                                    <td>{{ $arr_cart_checkout_date[$i] }}</td>
                                    <td>
                                        Adult:{{ $arr_cart_adult[$i] }}<br>
                                        Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td>
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
                            @php
                               
                            }
                            @endphp
                            
                            
                           
                            <tr>
                                <td colspan="8" class="tar">Total:</td>
                                <td>${{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="text-danger">
                        Cart is empty
                    </div>
                    @endif
                </div>                       

                <div class="checkout mb_20">
                    <a href="{{ route('checkout') }}" class="btn btn-primary bg-website">Checkout</a>
                </div>
                    
               
            </div>
        </div>
    </div>
</div>


@endsection