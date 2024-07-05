@extends('admin.layout.app')
@section('heading','Customer Orders')
@section('mainContent')

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order No</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Id</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->order_no }}
                                        </td>
                                        <td>
                                            {{ $item->payment_method }}
                                        </td>
                                        <td>
                                            {{ $item->transaction_id }}
                                        </td>
                                        <td>
                                            {{ $item->booking_date }}
                                        </td>
                                        <td>
                                            {{ $item->paid_amount }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_invoice',$item->id) }}" class="btn btn-primary">Details</a>
                                            <pre></pre>
                                            <a href="{{ route('admin_order_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection