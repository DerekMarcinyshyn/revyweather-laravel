@extends('layouts.master')

@section('html')
style="height:100%;width:100%"
@stop

@section('body')
class="map"
@stop

@section('content')

    <div class="container-fluid container-map">
        <div id="map-content" class="map-content"></div>
    </div>
@stop

@section('body_js')
{{ HTML::script('http://openlayers.org/api/OpenLayers.js') }}
{{ HTML::script('http://maps.google.com/maps/api/js?v=3&sensor=false') }}
{{ HTML::script('assets/js/map.js') }}
@stop