@php
    use App\Models\Content;
    /**
     * @var Content $post
     */
@endphp
@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('/css/post.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="container mt-2">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div id="postZone" class="col-8 card no-padding mh900">
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
                <div id="postOwnerInfo" class="row border-bottom pt-1 pb-1">
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
                <div id="postCaption" class="row border-bottom p-3">
                    {{ $post->getAttribute('caption') }}
                </div>
                <div id="reactionZone" class="row border-bottom">
                    <div class="p-3 pt-2 pb-2">
                        <button id="btn-upvote" class="btn btn-outline-white color-white btn-hover p-1 no-margin">
                            <i class="fa-solid fa-circle-arrow-up color-black fs24"></i>
                        </button>
                        <button id="btn-downvote" class="btn btn-outline-white color-white btn-hover p-0 no-margin">
                            <i class="fa-solid fa-circle-arrow-down color-black fs24"></i>
                        </button>
                        <span id="quinxCount-show" class="p-1">
                            {{ $post->getAttribute('quinx_count') }}
                        </span>
                        quinx
                    </div>
                </div>
                <div id="commentZone" class="row" style="height: 20px; background-color: black; width: 100%">

                </div>
                <div id="forComment" class="row">
                    <form class="d-flex full-width p-2 pe-0" method="POST" action="{{ route("comment.store", ['postId' => $post->getAttribute('id')]) }}">
                        @csrf
                        <input class="form-control me-2 circle-border" type="text" aria-label="userComment" name="comment">
                        <button class="btn btn-outline-white color-white btn-hover white-border">
                            <img src="{{ asset("assets/icon/fontawesome/circle-chevron-right-solid.svg") }}" alt=""
                                 height="100%">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('js.quinxFunctionality')
@endpush
