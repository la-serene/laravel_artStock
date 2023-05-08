@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-8">
                <div>
                    <img src="{{ asset($post->getAttribute('media')) }}" alt="" width="100%">
                </div>
            </div>
            <div class="col-4 bg-black"></div>
        </div>
    </div>
@endsection
