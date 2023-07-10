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
    <div class="container-sm mt-2">
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
        <div id="contentZone">
            <div id="postZone" class="card p-0">
                <div id="media-containter">
                    <img src="{{ asset($post->getAttribute('media')) }}" alt="" width="100%">
                    <div id="interactive" class="py-2">
                        <div id="interactive-btns" class="p-1">
                            <button class="interactive-btn">
                                <i class="fa-regular fa-star mx-1" style="color: #ffffff;"></i>
                            </button>
                            <button class="interactive-btn">
                                <i class="fa-regular fa-bookmark mx-1" style="color: #fafafa;"></i>
                            </button>
                            <button class="interactive-btn">
                                <i class="fa-regular fa-share-from-square mx-1" style="color: #ffffff;"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
            <div id="postOwnerZone">
                <div id="userZone">
                    <div id="postOwnerInfo" class="row border-bottom pt-1 pb-1">
                        <div class="col-6 flex-box">
                            <div class="row">
                                <a href="{{ route('user.profile', ['id' => $user->getAttribute('id')]) }}">
                                    <img class="user_avatar"
                                         src="{{ $post->get_user()->getAvatarUrl() }}"
                                         alt="">
                                </a>
                            </div>
                            <div class="ml10">
                                <div class="row halfHeight">
                                    <div class="fs-5">
                                        {{ $post->get_user()['username'] }}
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
                    <div id="postCaption" class="row border-bottom p-3 caption-text">
                        {{ $post->getAttribute('caption') }}
                    </div>
                    <div id="reactionZone" class="row border-bottom">
                        <div class="p-3 pt-2 pb-2">
                            <button id="btn-upvote" class="btn btn-outline-white color-white btn-hover p-1 m-0" data-post-id="{{ $post->getAttribute('id') }}">
                                <i class="fa-solid fa-circle-arrow-up color-black fs20"></i>
                            </button>
                            <button id="btn-downvote" class="btn btn-outline-white color-white btn-hover p-0 m-0" data-post-id="{{ $post->getAttribute('id') }}">
                                <i class="fa-solid fa-circle-arrow-down color-black fs20"></i>
                            </button>
                            <span id="quinxCount-show" class="p-1">
                            {{ $post->getAttribute('quinx_count') }}
                        </span>
                            quinx
                        </div>
                    </div>
                </div>
                <div id="commentZone" class="row scrollable-div border-bottom">
                    @php
                        $comments = $post->comment()->get();
                    @endphp
                    @foreach($comments as $comment)
                        <div class="row p-1 m-1 mx-0">
                            <div class="col-2 px-0 text-center">
                                <img class="user_avatar w40 h40"
                                     src="{{ $comment->user->getAvatarUrl() }}"
                                     alt="">
                            </div>
                            <div class="col-10 p-0">
                                <div class="card comment-block">
                                    <div class="card-body px-3 py-1">
                                        <div class="card-title fw-medium">
                                            {{ $comment->user->getAttribute('username') }}
                                        </div>
                                        <div class="card-text my-1 caption-text">
                                            {{ $comment->getAttribute('comment') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="forComment" class="row">
                    <form class="d-flex full-width p-2 pe-0" method="POST"
                          action="{{ route("comment.store", ['postId' => $post->getAttribute('id')]) }}">
                        @csrf
                        <input class="form-control me-2 circle-border" type="text" aria-label="userComment"
                               name="comment">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js?v=3"></script>
    @include('js.quinxFunctionality')
    <script src="{{ asset("/js") }}"></script>
@endpush
