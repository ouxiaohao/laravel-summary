<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>laravel - @yield('title')</title>
    @include('study.partials.import')
</head>
<body>
    @include('study.partials.header')
    <div class="container">
        @section('main')

        @show
    </div>

    @include('study.partials.footer')
</body>
</html>