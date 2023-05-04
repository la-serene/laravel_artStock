<div class="row container-fluid">
    <div class="col-8">
        @php
            $user = current_user();
        @endphp
        Welcome, {{ $user->getAttribute('first_name') }}
        <br>
        <a href="{{ route('user.logout') }}">
            LOG OUT
        </a>
    </div>
    <div class="col-4 container-fluid">
        <img id="user_avatar" src="https://www.yarrah.com/media/81/9c/f0/1644837814/Yarrah-cat-meow.jpg"
             alt="">
    </div>
</div>
