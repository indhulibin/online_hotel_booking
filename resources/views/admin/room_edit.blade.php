@extends('admin.layout.app')
@section('heading','Edit Room Details')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('room_view') }}" class="btn btn-primary"> <i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room_update',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt="" class="w_200">
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo *</label>
                                    <input type="file" class="form-control" name="featured_photo" value="">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $room_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" id="" class="form-control snote" cols="30" rows="10">
                                        {{$room_data->description}}
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Price *</label>
                                    <input type="text" class="form-control" name="price" value="{{$room_data->price }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total Room *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ $room_data->total_rooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities *</label>
                                    @php 
                                    $i = 0;
                                    @endphp
                                    @foreach($all_amenities as $item)
                                    @if(in_array( $item->id, $existing_amenities))
                                    @php $checked_type = 'checked';@endphp
                                    @else
                                    @php $checked_type = '';@endphp
                                    @endif
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=" {{ $item->id }}" id="flexCheckDefault{{ $i }}" name="arr_amenities[]" {{$checked_type  }}>
                                        <label class="form-check-label" for="flexCheckDefault{{ $i }}">
                                          {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Room Size*</label>
                                    <input type="text" class="form-control" name="size" value="{{$room_data->size }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Bed*</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ $room_data->total_beds }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Bathroom*</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ $room_data->total_bathrooms }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Balconies*</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ $room_data->total_balconies }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Guest*</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ $room_data->total_guests }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Video</label>
                                    <div>
                                        <div class="iframe-container1">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                    </div>
                                    
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Video Id*</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ $room_data->video_id }}">
                                </div>

                                
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection