@extends('admin.layout.app')
@section('heading','Add Room Photos of '.$room_data->name)
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('room_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Back to previous</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room_photo_store',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <input type="file" class="form-control" name="photo[]"multiple>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($room_photo_data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    
                                    <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_100 h_100">
                                </td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('room_photo_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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