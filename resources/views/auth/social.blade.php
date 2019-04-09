@extends('layouts.default')

@section('page_title')
    Social Login
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

                        @if ($errors->has('msg'))
                            <div class="alert alert-warning">
                                {{ $errors->first('msg') }}
                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <p class="lead text-center">Authenticate using your social network account from one of following providers</p>
                                <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-block">
                                    <i class="fab fa-facebook"></i> Login with Facebook
                                </a>

                                <a href="{{ route('social.oauth', 'twitter') }}" class="btn btn-info btn-block">
                                    <i class="fab fa-twitter"></i> Login with Twitter
                                </a>

                                <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-block">
                                    <i class="fab fa-google"></i> Login with Google
                                </a>

                                <a href="{{ route('social.oauth', 'github') }}" class="btn btn-gray-dark btn-block">
                                    <i class="fab fa-github"></i> Login with Github
                                </a>

                                <hr>
                                <a href="{{ route('login') }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-envelope"></i> Login with Email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
