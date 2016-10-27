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
        <p>学生管理系统</p>
        @include('home.partials.sidebar')

        @section('main')

        @show
    </div>

    @include('home.partials.footer')
</body>
</html>