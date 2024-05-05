@extends('admin.layout.app')
@section('heading','Add Video')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('video_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Video *</label>
                                    <input type="text" class="form-control" name="video" value="{{ old('video') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption</label>
                                    <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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