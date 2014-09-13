@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12">
            <h2>Mt Mackenzie</h2>
            {{ Thumbnail::image('api/latest-image.jpg') }}
        </div>

        <div class="col-sm-12">
            <h2>Highway Webcams</h2>
        </div>
        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/11.jpg" class="fancybox" rel="webcams" title="Revelstoke">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/11.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Revelstoke</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/101.jpg" class="fancybox" rel="webcams" title="Rogers Pass">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/101.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Rogers Pass</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/12.jpg" class="fancybox" rel="webcams" title="3 Valley Gap">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/12.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>3 Valley Gap</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/159.jpg" class="fancybox" rel="webcams" title="Jack McDonald Snowshed">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/159.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Jack McDonald Snowshed</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/135.jpg" class="fancybox" rel="webcams" title="Golden">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/135.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Golden</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/214.jpg" class="fancybox" rel="webcams" title="Kicking Horse Canyon">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/214.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Kicking Horse Canyon</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/218.jpg" class="fancybox" rel="webcams" title="Lake Louise">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/218.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Lake Louise</h5>
        </div>

        <div class="col-sm-3">
            <a href="http://images.drivebc.ca/bchighwaycam/pub/cameras/220.jpg" class="fancybox" rel="webcams" title="Banff">
                <img src="http://images.drivebc.ca/bchighwaycam/pub/cameras/220.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Banff</h5>
        </div>


        <div class="col-sm-12">
            <h2>Revelstoke Mountain Resort</h2>
        </div>
        <div class="col-sm-3">
            <a href="http://www.revelstokemountainresort.com/uploads/webcams/stoke.jpg" class="fancybox" rel="webcams" title="Mt Cartier">
                <img src="http://www.revelstokemountainresort.com/uploads/webcams/stoke.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Mt Cartier</h5>
        </div>
        <div class="col-sm-3">
            <a href="http://www.revelstokemountainresort.com/uploads/webcams/ripper.jpg" class="fancybox" rel="webcams" title="Ripper Chair">
                <img src="http://www.revelstokemountainresort.com/uploads/webcams/ripper.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Ripper Chair</h5>
        </div>
        <div class="col-sm-3">
            <a href="http://www.revelstokemountainresort.com/uploads/webcams/gondola.jpg" class="fancybox" rel="webcams" title="Mackenzie Outpost">
                <img src="http://www.revelstokemountainresort.com/uploads/webcams/gondola.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Mackenzie Outpost</h5>
        </div>
        <div class="col-sm-3">
            <a href="http://www.revelstokemountainresort.com/uploads/webcams/gnome.jpg" class="fancybox" rel="webcams" title="Gnorm">
                <img src="http://www.revelstokemountainresort.com/uploads/webcams/gnome.jpg" class="thumbnail img-responsive" />
            </a>
            <h5>Gnorm the Powder Gnome</h5>
        </div>



    </div>
</div>
@stop


@section('body_js')
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect      : 'elastic',
            closeEffect     : 'elastic',
            padding         : 20,
            minWidth        : 650
        });
    });
</script>
@stop