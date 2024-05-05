@extends('admin.layout.app')
@section('heading','Edit Photo')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('photo_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('photo_update',$photo_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$photo_data->photo) }}" alt="" class="w_200">
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption</label>
                                    <input type="text" class="form-control" name="caption" value="{{ $photo_data->caption }}">
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