<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="row">
<?php
echo Navbar::withBrand('Revelstoke Weather', '/')
    ->inverse()
    ->withContent(Navigation::links([
        [
            'link'      => URL::route('home'),
            'title'     => 'Right Now'
        ],
        [
            'link'      => URL::route('history'),
            'title'     => 'History'
        ],
        [
            'link'      => URL::route('webcams'),
            'title'     => 'Webcams'
        ],
        [
            'link'      => URL::route('map'),
            'title'     => 'Map'
        ],
        [
            'link'      => URL::route('timelapse'),
            'title'     => 'Timelapse'
        ],
        [
            'link'      => URL::route('about'),
            'title'     => 'About'
        ]
    ]));

?>
        </div>
    </div>
</div>