<!DOCTYPE html>
<html lang="en" @yield('html')>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revelstoke Weather</title>

    @yield('css')
<!--    {{ HTML::style('assets/css/src/bootstrap.min.css') }}-->
<!--    {{ HTML::style('assets/css/src/font-awesome.min.css') }}-->
<!--    {{ HTML::style('assets/css/src/climacons-font.css') }}-->
<!--    {{ HTML::style('assets/css/src/app.css') }}-->
    {{ HTML::style('assets/css/app.min.css') }}

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head_js')
</head>
<body @yield('body')>
    <header>
        @include('layouts.nav')
    </header>

    <section>
        @yield('flash')
    </section>

    <section class="content">
        @yield('content')
    </section>

    <footer>
        @include('layouts.footer')
    </footer>

    {{ HTML::script('assets/js/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    @yield('body_js')
</body>
</html>