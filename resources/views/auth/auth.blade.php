@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/auth.css?v=3') }}">
@endpush
@section('content')
    <div id="auth_form">
        <div id="form_zone">
            @yield('login_form')
            @yield('signup_form')
        </div>
    </div>
@endsection
