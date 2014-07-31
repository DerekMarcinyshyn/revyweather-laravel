@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('angular.index')
        </div>
    </div>
@stop

@section('body_js')
    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/skycons.js"></script>
    <script src="assets/js/angular.skycons.js"></script>
    <script src="assets/js/raphael.2.1.0.min.js"></script>
    <script src="assets/js/justgage.1.0.1.min.js"></script>
    <script src="assets/js/index.js"></script>
@stop