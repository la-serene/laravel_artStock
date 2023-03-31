<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/assets/icon/default.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('/assets/icon/themify-icons-font/themify-icons/themify-icons.css?v=2') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('/css/auth.css?v=2') }}">
    <title>{{ $title }}</title>
</head>
<body>
<div id="auth_form">
    <div id="form_zone">
        @yield('login_form')
        @yield('signup_form')
    </div>
</div>
</body>
</html>
