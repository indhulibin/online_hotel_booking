@extends('admin.layout.app')
@section('heading','View Rooms')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('room_add') }}" class="btn btn-primary"><i class="fa fa-plus "></i> Add New</a>
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Price(per night)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php 
                                        $i = 0;
                                    @endphp
                                    @foreach($rooms_data as $item)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="" class="w_100">
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            $ {{ $item->price }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button>
                                            <a href="{{ route('add_room_photo_gallery',$item->id) }}" class="btn btn-success">Photo Gallery</a>
                                            <a href="{{ route('room_edit',$item->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('room_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>

                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Room Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Photo</label></div>
                                                            <div class="col-md-8">
                                                                <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="" class="w_200">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Name</label></div>
                                                            <div class="col-md-8">{{ $item->name }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Description</label></div>
                                                            <div class="col-md-8">{!! $item->description !!}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total Rooms</label></div>
                                                            <div class="col-md-8">{{ $item->total_rooms }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Amenities</label></div>
                                                            <div class="col-md-8">
                                                                @php
                                                                $array = explode(',',$item->amenities);
                                                                for($j=0;$j<count($array);$j++)
                                                                {
                                                                    $aminity_value= 
                                                                    \App\Models\Amenity::where('id', $array[$j])->first();
                                                                    echo $aminity_value->name."<br>";
                                                                }
                                                                @endphp
                                                            </div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Size</label></div>
                                                            <div class="col-md-8">{{ $item->size }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total Beds</label></div>
                                                            <div class="col-md-8">{{ $item->total_beds }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total Bathrooms</label></div>
                                                            <div class="col-md-8">{{ $item->total_bathrooms }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total Balconies</label></div>
                                                            <div class="col-md-8">{{ $item->total_balconies }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Total Guest</label></div>
                                                            <div class="col-md-8">{{ $item->total_guests }}</div>
                                                        </div>

                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Video</label></div>
                                                            <div class="col-md-8">
                                                                <div class="iframe-container1">
                                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
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