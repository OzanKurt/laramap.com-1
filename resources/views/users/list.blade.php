@extends('layouts.default')

@section('page_title')
    Users
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <user-list></user-list>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
