@extends('layouts.default')

@section('page_title')
    {{ $user->username }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <user-profile :userid="{{ $user->id }}"></user-profile>
@endsection

@push('footer_scripts')

@endpush
