@extends('admin.layout.app')
@section('heading','Edit Testmonial')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('testmonial_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('testmonial_update',$testimonial_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$testimonial_data->photo) }}" alt="" class="w_100">
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo *</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $testimonial_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Designation *</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $testimonial_data->designation }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Comment *</label>
                                    <textarea class="form-control h_100" name="comment" id="" cols="30" rows="10">{{$testimonial_data->comment }}</textarea>
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