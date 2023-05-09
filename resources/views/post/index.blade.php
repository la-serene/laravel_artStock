@php
    use App\Models\Content;
    /**
     * @var Content $post
     */
@endphp
@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="container mt-2">
        <div class="row">
            <div id="postZone" class="col-8 card no-padding">
                <img src="{{ asset($post->getAttribute('media')) }}" alt="" width="100%">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 card-title">
                            <h2>
                                {{ $post->getAttribute('title') }}
                            </h2>
                        </div>
                        <div class="col-6 bg-black"></div>
                    </div>
                </div>
            </div>
            <div id="postOwnerZone" class="col-4">
                <div class="row border-bottom pt-1 pb-1">
                    <div class="col-6 flex-box">
                        <div class="row">
                            <div>
                                <img id="user_avatar"
                                     src="https://www.yarrah.com/media/81/9c/f0/1644837814/Yarrah-cat-meow.jpg"
                                     alt="">
                            </div>
                        </div>
                        <div class="ml10">
                            <div class="row halfHeight">
                                <div class="fs-5">
                                    {{ $user->getAttribute('username') }}
                                </div>
                            </div>
                            <div class="row halfHeight">
                                <div class="text-small">
                                    {{ $post->getAttribute('created_at')->format('d-m-Y H:m') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <button type="button" id="more-menu">
                                <i class="ti-more p-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row border-bottom p-3">
                    {{ $post->getAttribute('caption') }}
                </div>
                <div class="row border-bottom">
                    <div class="p-3 pt-2 pb-2">
                        <img src="{{ asset("assets/icon/fontawesome/circle-arrow-up-solid.svg") }}" alt=""
                             height="24px">
                        <img src="{{ asset("assets/icon/fontawesome/circle-arrow-down-solid.svg") }}" alt=""
                             height="24px">
                        <span>
                            {{ $post->getAttribute('like_count') }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
