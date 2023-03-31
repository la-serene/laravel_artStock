@extends('auth.auth')
@section('login_form')
    <form class="row g-3" action=" {{ route('authenticate') }} " method="POST">
        @csrf
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <a href=" {{ route('index') }}">
                    <img src="{{ asset('/assets/logo/logo.png') }}" alt="" height="90px">
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </form>
@endsection
