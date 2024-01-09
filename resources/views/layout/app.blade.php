<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Personal Dashboard') }}</title>

    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="sb-nav-fixed">
<div id="layoutSidenav">

    @include('layout.partials.topbar')
    @include('layout.partials.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
</html>
