@extends('layouts.default')

@section('page_title')
    Search Results
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container">
        @foreach($users as $user)
            {!! $user->name !!}
        @endforeach
    </div>
@endsection

@push('footer_scripts')

@endpush
