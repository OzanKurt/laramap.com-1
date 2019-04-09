@extends('layouts.default')

@section('page_title')
    Edit my account
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <user-edit></user-edit>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
