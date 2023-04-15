@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
@endpush
@section('content')
    <div id="navbar" class="container-fluid row flex-box" style="background-color: black">
        <div class="col-4">
            <a href="#">
                <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" height="90px">
            </a>
        </div>
        <div class="col-6">
            <div id="searchbar">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success bg-success color_white btn-hover" type="submit">Search</button>
                </form>
                <p class="text-center color_white letter-space">dipping in the cave of art..</p>
            </div>
        </div>
    </div>
@endsection
