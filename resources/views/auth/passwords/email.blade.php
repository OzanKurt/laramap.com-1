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

                        <form class="card" action="{{ route('password.email') }}" method="post">
                            @csrf

                            <div class="card-body p-6">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

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

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center text-muted">
                            Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
