@extends('admin.layout.app')
@section('heading','Edit About')
@section('right-top-btn')

@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_about_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Heading*</label>
                                    <input type="text" class="form-control" name="about_heading" value="{{ $page_data->about_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Content *</label>
                                    <textarea name="about_content" id="" class="form-control snote" cols="30" rows="10">
                                        {{ $page_data->about_content }}
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <select name="about_status" id="" class="form-control">
                                        <option value="1" @if($page_data->about_status == 1) selected @endif > 
                                        Show </option>
                                        <option value="0" @if($page_data->about_status == 0) selected @endif > Hide</option>
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