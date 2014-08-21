<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revelstoke Weather</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/fonts/climacons-font.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    @yield('css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head_js')
</head>
<body>
    <header>
        @include('layouts.nav')
    </header>

    <section>
        @yield('flash')
    </section>

    <section>
        @yield('content')
    </section>

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    @yield('body_js')
</body>
</html>