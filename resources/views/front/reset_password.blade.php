@extends('front.layout.app')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reset Password</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="login-form">
                    <form method="POST" action="{{ route('customer_reset_password_submit') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden">
                        <div class="mb-3">
                            <label for="" class="form-label">Rest Password</label>
                            <input type="text" class="form-control" name="password" value="">
                            @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" name="retype_password" value="">
                            @if ($errors->has('retype_password'))
                                    <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                            @endif
                        </div> 

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Submit</button>
                            <a href="login.html" class="primary-color">Back to Login Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection