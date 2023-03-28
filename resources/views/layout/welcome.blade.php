@extends('layout.master')
@section('intro')
    <div id="intro">
        <div id="navbar">
            <div id="navbar_leftElem" class="flex-box">
                <div id="leftElem_brand">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" height="90px">
                    </a>
                </div>
                <div id="leftElem_navbar" class="flex-box">
                    <div class="btn nav-btn color_white">
                        <a href="#">Home</a>
                    </div>
                    <div class="btn nav-btn color_white">
                        <a href="#">Latest</a>
                    </div>
                    <div class="btn nav-btn color_white">
                        <a href="#">Trending</a>
                    </div>
                    <div class="btn nav-btn color_white">
                        <a href="#">Category</a>
                    </div>
                    <div class="btn nav-btn color_white">
                        <a href="#">Forum</a>
                    </div>
                    <div class="btn nav-btn color_white">
                        <a href="#">About me</a>
                    </div>
                </div>
            </div>
            <div id="navbar_rightElem">
                <a href="/signin">
                    <div class="btn btn-primary">Sign In</div>
                </a>
                <a href="/signup">
                    <div class="btn btn-success">Sign Up</div>

                </a>
            </div>
        </div>
        <div id="searchbar">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success bg-success color_white btn-hover" type="submit">Search</button>
            </form>
            <p class="text-center color_white letter-space">dipping in the cave of art..</p>
        </div>
    </div>
@endsection

