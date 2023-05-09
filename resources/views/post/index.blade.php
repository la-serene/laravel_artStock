@php use Carbon\Carbon; @endphp
@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-8 card no-padding">
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
            <div class="col-4">
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
                                <div class="fs-6">
                                    {{ $post->getAttribute('created_at')->format('d-m-Y') }}
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
            </div>
        </div>
    </div>
@endsection
