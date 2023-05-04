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
            @include('users.user_menu')
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">New Post</a>
                    </li>
                </ul>
            </div>
            <div id="banner" class="mt-lg-4">
                <div id="carousel_banner" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel_banner" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel_banner" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carousel_banner" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                src="{{ asset('/assets/img/home/banner/A_girl_looking_at_the_city_back_Night_the_sky_is_full_of_star.jpg') }}"
                                alt="" class="full-width">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/img/home/banner/space_girls.jpg') }}" class="d-block w-100" alt="..."
                                 width="1240px">
                        </div>
                        <div class="carousel-item">
                            <img
                                src="{{ asset('/assets/img/home/banner/John_Wick.jpg') }}"
                                class="d-block w-100" alt="..." width="1240px">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_banner"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_banner"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
{{--        @include("layout.footer")--}}
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
