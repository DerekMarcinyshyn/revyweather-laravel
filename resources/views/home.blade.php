@extends('layout')

@section('content')
<section ng-controller="HomeController" ng-cloak>
    <h1><a href="{{ url('/') }}">Home</a></h1>
</section>
@endsection