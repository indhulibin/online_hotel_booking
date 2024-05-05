@extends('admin.layout.app')
@section('heading','Edit Video')
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
                    <form action="{{ route('video_update',$video_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Existing video</label>
                                    <div class="iframe-container1">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video *</label>
                                    <input type="text" class="form-control" name="video" value="{{ $video_data->video }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption</label>
                                    <input type="text" class="form-control" name="caption" value="{{ $video_data->caption }}">
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