@extends('admin.layout.app')
@section('heading','Customers')

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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cutomers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($item->photo!='')
                                            <img src="{{ asset('uploads/'. $item->photo) }}" alt="" class="w_150">
                                            @else
                                            <img src="{{ asset('uploads/default.png') }}" alt="" class="w_100">
                                            @endif
                                        </td>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            {{$item->email}}
                                        </td>
                                        <td>
                                            {{$item->phone}}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            @if($item->status == 1)                                            
                                                <a href="{{ route('customer_status_change',$item->id) }}" class="btn btn-success">Active</a>
                                            @else
                                                <a href="{{ route('customer_status_change',$item->id) }}" class="btn btn-danger">Pending</a>
                                            @endif
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