@extends('admin.layout.app')
@section('heading','Add Amenity')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('amenity_show') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('amenity_store') }}" method="post">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Name*</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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