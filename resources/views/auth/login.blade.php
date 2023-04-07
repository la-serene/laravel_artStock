@extends('auth.auth')
@section('login_form')
    <form class="row g-3" action=" {{ route('authenticate') }} " method="POST">
        @csrf
        <div class="col-12 text-center">
            <a href="{{ route('index') }}">
                <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" height="90px">
            </a>
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password">
            <div class="flex-box flex-end mt-8">
                <a href="#">
                    Forgot password?
                </a>
            </div>
        </div>
        <div class="h10"></div>
        <div id="form_helper" class="row">
            <div class="col-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col-4 noPadding flex-box flex-end mt-8">
                <a href="{{ route('signup') }}">
                    Don't have an account yet? Sign up
                </a>
            </div>
        </div>
        <div class="h10"></div>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <div class="col-5"></div>
        </div>
    </form>
@endsection
