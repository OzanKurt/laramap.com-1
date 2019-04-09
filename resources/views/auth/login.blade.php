@extends('layouts.default')

@section('page_title')
    Login
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

                        <form class="card" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="card-body p-6">
                                <div class="card-title">Login to your account</div>
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        Password
                                        <a href="{{ route('password.request') }}" class="float-right small">I forgot my password</a>
                                    </label>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" name="password" placeholder="Password">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="custom-control-label">Remember me</span>
                                    </label>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                                    <a href="{{ url('/auth/social') }}" class="btn btn-block btn-secondary">
                                        Social Login
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div class="text-center text-muted">
                            Don't have account yet? <a href="{{ route('register') }}">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
