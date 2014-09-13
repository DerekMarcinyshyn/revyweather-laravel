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
<script>
    $(document).ready(function($) {
        $('#wrapper-loader').hide();
        $('#wrapper').fadeIn(750);
    });
</script>
@stop
