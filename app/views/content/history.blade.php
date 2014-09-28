@extends('layouts.master')

@section('body')
class="history"
@stop

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label for="history-dates">Select dates:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="history-dates" id="history-dates" class="form-control" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="history-chart" style="width:100%; height:600px;"></div>
        </div>
    </div>
</div>

@stop