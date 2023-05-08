<div id="user_header" class="container-fluid row no-margin">
    <div class="col-2">
        <a href="{{ route('user.index') }}">
            <img src="{{ asset('/assets/logo/cover-removebg-preview (1).png') }}" alt="" class="full-width">
        </a>
    </div>
    <div class="col-8 d-flex align-items-center">
        <div id="searchbar" class="full-width">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-white color-white btn-hover white-border" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="col-2 text-white d-flex align-items-center">
        @yield('topRightMost_zone')
    </div>
</div>
