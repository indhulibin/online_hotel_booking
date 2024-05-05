@extends('admin.layout.app')
@section('heading','Edit Post')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('post_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('post_update',$post_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$post_data->photo) }}" alt="" class="w_200">
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="heading" value="{{ $post_data->heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Content *</label>
                                    <textarea class="form-control h_100" name="short_content" id="" cols="30" rows="10">{{ $post_data->short_content  }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Content *</label>
                                    <textarea name="content" id="" class="form-control snote" cols="30" rows="10">
                                        {{ $post_data->content }}
                                    </textarea>
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