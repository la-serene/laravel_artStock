@extends('auth.auth')
@section('login_form')
    <form class="row g-3" action=" {{ route('password.email') }} " method="POST">
        @csrf
        <div class="col-12 text-center">
            <a href="{{ route('index') }}">
                <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" height="90px">
            </a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="h10"></div>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-5"></div>
        </div>
    </form>
@endsection
