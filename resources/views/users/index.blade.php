@php
    use App\Models\Content;use Illuminate\Support\Facades\File;
@endphp
@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="row no-margin">
        <div class="col-1"></div>
        <div class="col-10">
            <div id="user_navbar">
                <ul class="nav" style="background-color: pink">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.new') }}">New Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About me</a>
                    </li>
                </ul>
            </div>
            <div id="user_banner" class="mt-lg-4">
                @php
                    $banners = File::allFiles(public_path('assets/img/home/banner'));
                @endphp
                <div id="carousel_banner" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($banners as $banner)
                            <button type="button" data-bs-target="#carousel_banner"
                                    data-bs-slide-to="{{ $loop->iteration - 1 }}"
                                    class="{{ $loop->first ? 'active' : '' }}"
                                    aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($banners as $banner)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="4000">
                                <img
                                    src="{{ asset('/assets/img/home/banner/' . $banner->getFilename()) }}"
                                    alt="" class="d-block w-100">
                            </div>
                        @endforeach
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
            <div id="user_latestOfTheDay">
                <div class="user_sectionTitle mt-2 p-2">
                    LATEST
                </div>
                @php
                    $latestPosts = Content::query()->take(10)->get();
                @endphp
                <div class="user_slickCarousel mt-2 mb-2">
                    @foreach($latestPosts as $latestPost)
                        <a class="block" href="{{ route('post.index', ['postId' => $latestPost->getAttribute('id')]) }}">
                            <img src="{{ asset($latestPost->getAttribute('media')) }}" alt="" height="200px">
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        {{--        @include("layout.footer")--}}
    </div>
@endsection
@push('slick')
        <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
@endpush
@push('js')
    <script src="{{ asset('js/user.js') }}"></script>
@endpush
