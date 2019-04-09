@extends('layouts.default')

@section('page_title')
    Reset Password
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="text-center mb-6">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('static/laramap_logo.svg') }}" class="h-6" alt="Laramap.com Logo">
                            </a>
                        </div>

                        <form class="card" action="{{ route('password.request') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="card-body p-6">
                                <div class="card-title">Forgot password</div>
                                <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">New Password</label>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" aria-describedby="passwordHelp" name="password" placeholder="Enter password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp" name="password_confirmation" placeholder="Confirm password" required>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Reset password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
