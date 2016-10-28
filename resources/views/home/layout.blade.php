<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>laravel - @yield('title')</title>
    @include('home.partials.import')
</head>
<body>
    @include('home.partials.header')
    <div class="container">
        @section('main')

        @show
    </div>

    @include('home.partials.footer')
</body>
</html>