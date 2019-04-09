@extends('layouts.default')

@section('page_title')
    About
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title">
                        About
                    </h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <h2 id="what-is-laramap" class="mt-0 mb-4">What is Laramap.com?</h2>
                            <p>
                                Laramap is a platform for laravel-developers around the world.
                                On Laramap you can connect to other laravel developers in your area, create local user-groups and write articles. But you can also follow up whats going on in the community.
                            </p>

                            <h2 id="story">Story</h2>
                            <p>
                                Back in 2015, <a href="https://twitter.com/fwartner">Florian Wartner</a> was building up Laramap.com as his first project made with Laravel 4.2 .. He was looking for a community, that shows him developers in his area to connect, learn and collaborate. The project was much welcome by the community.
                                Within a few weeks there were over 3000 developers around the world signed up to the website.
                            </p>

                            <p>
                                After a shutdown due to some personal issues, he went back to his computer and re-wrote everything to it´s current state.

                            </p>

                            <h2 id="stack">Tech-Stack behind Laramap.com</h2>
                            <ul>
                                <li><a href="https://laravel.com">Laravel 5.7</a> (Backend)</li>
                                <li><a href="https://vuejs.org">Vue.js</a> (Frontend)</li>
                                <li><a href="https://getbootstrap.com">Bootstrap 4</a> (Frontend)</li>
                                <li><a href="https://fontawesome.com">FontAwesome 5</a> (Pro)</li>
                                <li><a href="https://redis.io">Redis</a> (Cache and Queues)</li>
                                <li><a href="https://pusher.com">Pusher.com</a> (Realtime)</li>
                                <li><a href="https://algolia.com">Algolia</a> (Search as a Service)</li>
                                <li><a href="https://forge.laravel.com">Laravel Forge</a> (Server Management)</li>
                                <li><a href="https://m.do.co/c/3dca62b8d69e">DigitalOcean</a> (Hosting)</li>
                            </ul>

                            <div class="alert alert-warning">
                                <strong>Info!</strong> The tech-stack can change fast. We try to keep this site as updated as possible.
                            </div>

                            <h2 id="media">Media</h2>
                            <ul>
                                <li><a href="https://laravel-news.com/laramap-a-directory-of-laravel-developers">Laravel News</a> (June 08, 2015)</li>
                            </ul>
                            <h3 id="bugs-and-feature-requests">Bugs and feature requests</h3>
                            <p>Have a bug or a feature request? <a href="https://github.com/laramap/laramap.com/issues/new/choose">Please open a new issue</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
