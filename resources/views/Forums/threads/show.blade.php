@extends('layouts.default')

@section('page_title')
    {{ $thread->title }}
@endsection

@section('meta')
    <meta property="og:url" content="{{ url('/forums/threads/' . $thread->slug) }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $thread->title }}"/>
    <meta property="og:description" content="{{ strip_tags($thread->body) }}"/>
    <meta name="og:image" content="https://laramap.com/static/og_logo.png">

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@laramapcom" />
    <meta name="twitter:title" content="{{ $thread->title }}" />
    <meta name="twitter:description" content="{{ strip_tags($thread->body) }}" />
    <meta name="twitter:image:src" content="https://laramap.com/static/og_logo_twitter.png">
@endsection

@push('header_styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/forums">Forums</a></li>
                            <li class="breadcrumb-item"><a href="/forums/categories/{{ $thread->category->slug }}">{{ $thread->category->title }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $thread->title }}</li>
                        </ol>
                    </nav>

                    <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7DPKJL&placement=laramapcom" id="_carbonads_js"></script>

                </div>

                <single-thread :threadid="{{ $thread->id }}"></single-thread>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
