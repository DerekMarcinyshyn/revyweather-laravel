<!DOCTYPE html>
<html lang="en" @yield('html')>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revelstoke Weather</title>

    @yield('css')
    {{ HTML::style('assets/css/'.css_asset_path('app.min.css')) }}

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head_js')
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-43832169-1', 'auto');
      ga('send', 'pageview');

    </script>
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

    {{ HTML::script('assets/js/'.js_asset_path('app.min.js')) }}

    @yield('body_js')
</body>
</html>