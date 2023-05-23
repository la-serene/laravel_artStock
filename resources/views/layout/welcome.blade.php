<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/assets/icon/default.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('/assets/icon/themify-icons-font/themify-icons/themify-icons.css?v=2') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/footer.css?v=3') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css?v=3') }}">
    @stack('css')
    <title>{{ $title }}</title>
</head>
<body>
<div id="main">
    @yield('content')
</div>
@stack('slick')
</body>
</html>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
@stack('js')
