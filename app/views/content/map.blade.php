@extends('layouts.master')

@section('html')
style="height:100%;width:100%"
@stop

@section('body')
class="map"
@stop

@section('content')
    <div class="map-preloader">
        <iframe src="https://embed.windyty.com/?700h,clouds,now,52.988,-115.312,5,,menu,message," width="100%" height="95%" frameborder="0"></iframe>
    </div>
@stop

