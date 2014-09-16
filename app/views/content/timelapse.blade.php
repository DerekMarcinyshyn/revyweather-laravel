@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Timelapse</h1>
        </div>
        <div class="col-sm-6">
            <div class="btn-group">
                <button id="timelapse-previous" value="" type="button" class="btn btn-info btn-sm">Previous Month</button>
                <button id="timelapse-next" value="" type="button" class="btn btn-info btn-sm">Next Month</button>
                <input id="timelapse-year-previous" value="" type="hidden"/>
                <input id="timelapse-year-next" value="" type="hidden"/>
            </div>
            <p>&nbsp;</p>
            <div id="timelapse-loader">{{ HTML::image('assets/img/loader.gif') }}</div>
            <div id="timelapse-calendar" class="timelapse-calendar"></div>
        </div>
        <div class="col-sm-6">
            <?php $yesterday = date('F d, Y', strtotime('yesterday')); ?>
            <h3 id="timelapse-video-title" class="timelapse-video-title"><?php echo $yesterday ?></h3>
            <video id="timelapse-video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="540" height="304" data-setup="{}" poster="/assets/img/weather-station.jpg">
                <?php $path = date('Y/F/d/F-d', strtotime('yesterday')); ?>
                <source src="http://video.revyweather.com/<?php echo $path ?>.webm" type="video/webm">
                <source src="http://video.revyweather.com/<?php echo $path ?>.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>
@stop

