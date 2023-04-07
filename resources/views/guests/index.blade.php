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
                            Category
                        </div>
                    </a>
                    <a href="#">
                        <div class="btn nav-btn color_white">
                            Forum
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
    <div id="landing1">

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
