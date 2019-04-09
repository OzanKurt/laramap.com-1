@extends('layouts.default')

@section('page_title')
    {{ $category->title }}
@endsection

@push('header_styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <thread-category-list :categoryid="{{ $category->id }}"></thread-category-list>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
