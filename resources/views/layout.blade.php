<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revy Weather</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    @if (Config::get('app.debug'))
        <link rel="stylesheet" href="{{ url('css/all.css') }}"/>
    @else
        <link rel="stylesheet" href="{{ url(elixir("css/all.css")) }}">
    @endif

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body ng-app="RevyWeatherApp" layout="column" ng-cloak class="@yield('classBody')">
@include('nav')
@yield('content')
@if ( Config::get('app.debug') )
    <script src="{{ url('js/all.js') }}"></script>
@else
    <script src="{{ url(elixir("js/all.js")) }}"></script>
@endif
@yield('scripts')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-43832169-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>