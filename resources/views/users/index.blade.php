@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    {{ $user = Auth::user() }}
    <div id="navbar" class="container-fluid row bg-black noMargin">
        <div class="col-2">
            <a href="{{ route('user.index') }}">
                <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" height="90px">
            </a>
        </div>
        <div class="col-8 flex-box align-center">
            <div id="searchbar" class="full-width">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-white color_white btn-hover" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="col-2 text-white">
            <div class="row container-fluid align-center">
                <div class="col-8">
                    Welcome
                    <br>
                    <a href="{{ route('user.logout') }}">
                        LOG OUT
                    </a>
                </div>
                <div id="user_avatar" class="col-4 container-fluid"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        window.addEventListener("pageshow", function (event) {
            let historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>
@endpush
