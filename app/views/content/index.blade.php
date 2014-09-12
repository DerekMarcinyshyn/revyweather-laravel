@extends('layouts.master')

@section('content')
<div id="wrapper-loader"><img src="{{ asset('assets/img/loader.gif') }}" /></div>
<div id="wrapper" style="display:none;">
    <div class="container">
        <div class="row">
            @include('angular.index')
        </div>
    </div>
</div>
@stop

@section('body_js')
{{ HTML::script('assets/js/angular.min.js') }}
{{ HTML::script('assets/js/ui-bootstrap-tpls-0.11.0.min.js') }}
{{ HTML::script('assets/js/skycons.js') }}
{{ HTML::script('assets/js/angular.skycons.js') }}
{{ HTML::script('assets/js/raphael.2.1.0.min.js') }}
{{ HTML::script('assets/js/justgage.1.0.1.js') }}
{{ HTML::script('assets/js/index.js') }}

<script>
    $(document).ready(function($) {
        $('#wrapper-loader').hide();
        $('#wrapper').fadeIn(750);
    });
</script>
@stop
