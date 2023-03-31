<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/assets/icon/default.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('/assets/icon/themify-icons-font/themify-icons/themify-icons.css?v=2') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css?v=2') }}">
    <title>{{ $title }}</title>
</head>
<body>
<div id="main">
    <div id="intro">
        <div id="navbar">
            <div id="navbar_leftElem" class="flex-box">
                <div id="leftElem_brand">
                    <a href="" @click="reloadPage">
                        <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" height="90px">
                    </a>
                </div>
                <div id="leftElem_navbar" class="flex-box">
                    <a href="">
                        <div class="btn nav-btn color_white" @click="reloadPage">
                            Home
                        </div>
                    </a>
                    <a href="#">
                        <div class="btn nav-btn color_white">
                            Category
                        </div>
                    </a>
                    <a href="#">
                        <div class="btn nav-btn color_white">
                            Forum
                        </div>
                    </a>
                    <a href="#">
                        <div class="btn nav-btn color_white">
                            About me
                        </div>
                    </a>
                </div>
            </div>
            <div id="navbar_rightElem">
                <a href="/login">
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
    @include('layout.newsfeed')
    @include('layout.footer')
</div>
</body>
</html>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="">
    export default {
        method: {
            reloadPage() {
                location.reload();
            }
        }
    }
</script>
