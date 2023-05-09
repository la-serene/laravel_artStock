@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-8">
                <div>
                    <img src="{{ asset($post->getAttribute('media')) }}" alt="" width="100%">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h2>
                                {{ $post->getAttribute('title') }}
                            </h2>
                            <h6>
                                {{ $post->getAttribute('caption') }}
                            </h6>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-black"></div>
        </div>
    </div>
@endsection
