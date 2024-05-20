@extends('admin.layout.app')
@section('heading','Edit SignUp')
@section('right-top-btn')

@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_signup_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Heading*</label>
                                    <input type="text" class="form-control" name="signup_heading" value="{{ $page_data->signup_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <select name="signup_status" id="" class="form-control">
                                        <option value="1" @if($page_data->signup_status == 1) selected @endif > 
                                        Show </option>
                                        <option value="0" @if($page_data->signup_status == 0) selected @endif > Hide</option>
                                    </select>
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