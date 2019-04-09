@extends('layouts.default')

@section('page_title')
    Users in {{ $country }}
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/users">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $country }}</li>
                        </ol>
                    </nav>
                </div>

                <user-list-by-country country="{{ $country }}"></user-list-by-country>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
