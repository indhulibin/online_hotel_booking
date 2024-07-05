@extends('admin.layout.app')
@section('heading','Room(Booked & available) for '.$selected_date) 
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('datewise_room_available') }}" class="btn btn-primary"></i>Back</a>
</div>
@endsection
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
                                        <th>Room Name</th>
                                        <th>Total Room</th>
                                        <th>Booked Room</th>
                                        <th>Available Room</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->total_rooms }}
                                        </td>
                                        <td>
                                            @php
                                                $cnt = \App\Models\BookedRoom::where('room_id',$item->id)->where('booking_date',$selected_date)->count();
                                            @endphp
                                            {{ $cnt }}
                                        </td>
                                        <td>
                                            {{ $item->total_rooms -  $cnt}}
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