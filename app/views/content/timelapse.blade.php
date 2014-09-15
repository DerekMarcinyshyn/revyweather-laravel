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
            <div id="timelapse-calendar" class="timelapse-calendar"></div>
        </div>
        <div class="col-sm-6">
            Video player
        </div>
    </div>
</div>
@stop