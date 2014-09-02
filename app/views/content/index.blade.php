@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @include('angular.index')
    </div>
</div>
@stop

@section('body_js')
{{ HTML::script('assets/js/angular.min.js') }}
{{ HTML::script('assets/js/ui-bootstrap-tpls-0.11.0.min.js') }}
{{ HTML::script('assets/js/skycons.js') }}
{{ HTML::script('assets/js/angular.skycons.js') }}
{{ HTML::script('assets/js/raphael.2.1.0.min.js') }}
{{ HTML::script('assets/js/justgage.1.0.1.min.js') }}
{{ HTML::script('assets/js/index.js') }}
@stop