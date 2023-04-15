@extends('layout.welcome')
@section('content')
    Logged in :V
    <p>
        email is {{ session('name') }}
    </p>
    <p>
        password is {{ session('password') }}
    </p>
    <br>
    <div>
        <a href="{{ route('user.logout') }}">
            <div>LOG OUT</div>
        </a>
    </div>
@endsection
