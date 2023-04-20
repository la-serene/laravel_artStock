@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    <div id="header" class="container-fluid row no-margin">
        <div class="col-2">
            <a href="{{ route('user.index') }}">
                <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" class="full-width">
            </a>
        </div>
        <div class="col-8 d-flex align-items-center">
            <div id="searchbar" class="full-width">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-white color_white btn-hover" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="col-2 text-white d-flex align-items-center">
            <div class="row container-fluid">
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
                    <img id="user_avatar" src="https://www.yarrah.com/media/81/9c/f0/1644837814/Yarrah-cat-meow.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row no-margin">
        <div class="col-1"></div>
        <div class="col-10">
            <div>
                <ul class="nav" style="background-color: pink">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About me</a>
                    </li>
                </ul>
            </div>
            <div id="banner" class="mt-lg-4">
                <img src="{{ asset('/assets/bg/A_girl_looking_at_the_city_back_Night_the_sky_is_full_of_star_banner.png') }}" alt="" class="full-width">
            </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
@push('js')
    <script>
        window.addEventListener("pageshow", function (event) {
            let historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>
@endpush
