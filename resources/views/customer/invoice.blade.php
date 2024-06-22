@extends('customer.layout.app')
@section('heading','Invoice')
@section('mainContent')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order Number: {{ $order->order_no }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Invoice To</strong><br>
                                {{Auth::guard('customer')->user()->name}}<br>
                                {{Auth::guard('customer')->user()->address}}<br>
                                {{Auth::guard('customer')->user()->state}},
                                {{Auth::guard('customer')->user()->city}},
                                {{Auth::guard('customer')->user()->zip}}<br>
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Invoice Date</strong><br>
                               {{$order->booking_date}}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Hotel booking room information.</p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Room Type</th>
                                <th class="text-center">CheckIn Date</th>
                                <th class="text-center">CheckOut Date</th>
                                <th class="text-center">Number of Adult</th>
                                <th class="text-center">Number of Children/th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            @foreach( $order_details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                    $room_name = App\Models\Room::where('id',$item->room_id)->first();
                                    echo $room_name->name;
                                    @endphp
                                </td>
                                <td class="text-center">{{ $item->check_in_date }}</td>
                                <td class="text-center">{{ $item->check_out_date }}</td>
                                <td class="text-right">{{ $item->adult }}</td>
                                <td class="text-right">{{ $item->children }}</td>
                                <td class="text-right">{{ $item->subtotal }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">${{ $order->paid_amount }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection