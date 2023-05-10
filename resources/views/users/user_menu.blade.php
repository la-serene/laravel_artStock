@extends('users.header')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('topRightMost_zone')
    <div class="row container">
        <div class="col-8">
            @php
                $user = current_user();
            @endphp
            Welcome, {{ $user->getAttribute('first_name') }}
            <br>
            <a href="{{ route('user.logout') }}">
                LOG OUT
            </a>
        </div>
        <div class="col-4 container-fluid">
            <img id="user_avatar" src="{{ asset('/assets/img/temp/Yarrah-cat-meow.jpg') }}"
                 alt="">
        </div>
    </div>
@endsection
