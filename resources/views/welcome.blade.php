@extends('layouts.default')

@section('page_title')
    Home
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <home-map></home-map>

    <br>

    <div class="container">
        <section id="about">
            <h3 class="text-center">
                What is Laramap?
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <p class="text-center">
                        Laramap is a platform for laravel-developers around the world. On Laramap you can connect to other laravel developers in your area, create local user-groups and write articles. But you can also follow up whats going on in the community.
                    </p>
                </div>
            </div>

        </section>

        <hr width="50%">

        <section id="stats">
            <h3 class="text-center">
                Some numbers from the community
            </h3>

            <br>

            <div class="row row-cards justify-content-center">
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="h1 m-0">{{ \App\Models\User::all()->count() }}</div>
                            <div class="text-muted mb-4">Users worldwide</div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="h1 m-0">{{ \App\Models\Thread::all()->count() }}</div>
                            <div class="text-muted mb-4">Discussion threads</div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="h1 m-0">{{ \App\Models\Reply::all()->count() }}</div>
                            <div class="text-muted mb-4">Replies on resources</div>
                        </div>
                    </div>
                </div>

                {{--<div class="col-6 col-sm-4 col-lg-2">--}}
                    {{--<div class="card">--}}
                        {{--<script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7DPKJL&placement=laramapcom" id="_carbonads_js"></script>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </section>

        <hr width="50%">

        <section id="sponsors">
            <h3 class="text-center">
                Our lovely sponsors
            </h3>

            <br>

            <div class="row">
                <div class="col-3 text-center">
                    <img src="{{ asset('static/DO_Logo_Horizontal_Blue.png') }}" alt="DigitalOcean" style="max-height: 40px;">
                </div>

                <div class="col-3 text-center">
                    <img src="{{ asset('static/logo-algolia-nebula-blue-whitespaces-1b393e11.png') }}" alt="Algolia" style="max-height: 40px;">
                </div>

                <div class="col-3 text-center">
                    <img src="{{ asset('static/pusher.png') }}" alt="Pusher" style="max-height: 40px;">
                </div>

                <div class="col-3 text-center">
                    <img src="{{ asset('static/vultr.png') }}" alt="Vultr" style="max-height: 40px;">
                </div>
            </div>
        </section>

        <hr width="50%">

        <br>

        <section id="resources">
            <h3 class="text-center">
                Latest Resources & Tools
            </h3>

            <br>

            <div class="container">
                <div class="row">
                    @foreach(\App\Models\Resource::where('is_published', true)->get()->reverse()->take(4) as $resource)
                        <div class="col-sm-3">
                            <div class="card">
                                <a href="{{ $resource->url}}?utm_source=laramap&utm_medium=website">
                                    <img class="card-img-top" src="{{ asset('/storage/') . '/' .  $resource->header_image }}" alt="{{ $resource->slug }}">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h4><a href="{{ $resource->url}}?utm_source=laramap&utm_medium=website">{{ $resource->title }}</a></h4>
                                    <div class="text-muted">{{ $resource->body }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <hr width="50%">
        <br>
    </div>
@endsection

@push('footer_scripts')

@endpush
