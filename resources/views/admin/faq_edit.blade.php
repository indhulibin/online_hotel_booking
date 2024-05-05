@extends('admin.layout.app')
@section('heading','Edit FAQ')
@section('right-top-btn')
<div class="ml-auto">
    <a href="{{ route('faq_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection
@section('mainContent')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('faq_update',$faq_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Question *</label>
                                    <input type="text" class="form-control" name="question" value="{{ $faq_data->question }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Answer *</label>
                                    <textarea name="answer" id="" class="form-control snote" cols="30" rows="10">
                                        {{ $faq_data->answer }}
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