@extends('admin.layout.app')
@section('heading','View Post')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('post_add') }}" class="btn btn-primary"><i class="fa fa-plus "></i> Add New</a>
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
                                        <th>Heading</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="" class="w_200">
                                        </td>
                                        <td>
                                            {{ $post->heading }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('post_edit',$post->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('post_delete',$post->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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