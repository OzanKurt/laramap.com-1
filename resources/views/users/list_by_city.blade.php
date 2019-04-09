@extends('layouts.default')

@section('page_title')
    Users in {{ $city }}, {{ $country }}
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
                            <li class="breadcrumb-item"><a href="/users/{{ $country }}">{{ $country }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $city }}</li>
                        </ol>
                    </nav>
                </div>

                <user-list-by-city country="{{ $country }}" city="{{ $city }}"></user-list-by-city>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
