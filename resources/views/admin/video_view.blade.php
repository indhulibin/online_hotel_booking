@extends('admin.layout.app')
@section('heading','View Video')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('video_add') }}" class="btn btn-primary"><i class="fa fa-plus "></i> Add New</a>
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
                                        <th>Video</th>
                                        <th>Caption</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($video_data as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="iframe-container1">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                        </td>
                                        <td>
                                           {{ $video->caption }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('video_edit',$video->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('video_delete',$video->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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