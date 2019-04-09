@extends('layouts.default')

@section('page_title')
    Register
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

                        <form class="card" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="card-body p-6">
                                <div class="card-title">Create new account</div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Enter username" value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Terms of Service</label>
                                    <input type="checkbox" name="terms" class="form-control{{ $errors->has('terms') ? ' is-invalid' : '' }}" value="1" {{ old('terms') ? 'checked' : '' }}> I agree to the <a href="{{ url('/terms') }}">Terms of Service</a>
                                    @if ($errors->has('terms'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Create new account</button>

                                    <a href="{{ url('/auth/social') }}" class="btn btn-block btn-secondary">
                                        Social Login
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div class="text-center text-muted">
                            Already have account? <a href="{{ route('login') }}">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
