@extends('layout.welcome')
@section('content')
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
                            Marketplace
                        </div>
                    </a>
                    <a href="#footer">
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
    <div id="landing1" class="position-relative">
        <img id="item1" class="landing1_img"
             src="{{ asset('/assets/bg/DALL·E 2023-04-07 17.38.43 - A photo of a teddy bear on a skateboard in Times Square.png') }}"
             alt="" height="200px">
        <h1 id="item2">
            Bring yourself to the endless wonders
            <br>
            waiting to be explored...
        </h1>
        <div id="item3">
            <div class="row align-center">
                <div class="col-4">
                    <img class="landing1_img" src="{{ asset('/assets/bg/0_0-52.webp') }}" alt="" height="280px">
                </div>
                <div class="col-4">
                    <img class="landing1_img" src="{{ asset('/assets/bg/a615a5b8bd317d09.png') }}" alt=""
                         height="360px">
                </div>
                <div class="col-4">
                    <img class="landing1_img"
                         src="{{ asset('/assets/bg/GalaxyDydy_Nebulous_ArtLightSkyBlueDarkBlackWhiteHyperdetaileda_a26df724-8c24-481a-9e70-354b77fcdec0.png') }}"
                         alt="" height="280px">
                </div>
            </div>
        </div>
        <img id="item4" class="landing1_img" src="{{ asset('/assets/bg/Medieval_61.png') }}" alt="" height="200px">
        <img id="item5" class="landing1_img"
             src="{{ asset('/assets/bg/Byte_flat_illustration_by_Jason_Brooks_a_time_tunnel_the_Statue_180b8f3e-c160-4e8d-b37f-6e6446a29d6c.png') }}"
             alt="" height="200px">
    </div>
    @include('layout.footer')
@endsection
@push('js')
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
@endpush

