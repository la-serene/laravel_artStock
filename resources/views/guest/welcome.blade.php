<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('/assets/icon/themify-icons-font/themify-icons/themify-icons.css?v=2') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>
<body>
<div id="main" style="width: 100%; height: 3000px; background-color: salmon">
    <div id="intro">
        <div id="navbar">
            <div id="navbar_leftElem" class="flex-box">
                <div id="leftElem_brand">
                    <a href="#">
                        <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" height="90px">
                    </a>
                </div>
                <div id="leftElem_navbar" class="flex-box">
                    <div class="btn nav-btn color_white">
                        <a href="#">Dashboard</a>
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
                <a href="{{ route('auth.login') }}">
                    <div class="btn btn-primary">Sign In</div>
                </a>
                <a href="{{ route('auth.register') }}">
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
    @include('layout.newsfeed')
</div>
</body>
</html>
