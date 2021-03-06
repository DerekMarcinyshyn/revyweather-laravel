/**
 * gulpfile.js
 * @author  Derek Marcinyshyn
 * @date    2016-03-20
 */

var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
        // fonts
        .copy('bower_components/font-awesome/fonts', 'resources/assets/fonts')
        .copy('resources/assets/fonts', 'public/fonts')
        .copy('resources/assets/fonts', 'public/build/fonts')
        .copy('bower_components/video.js/dist/font', 'resources/assets/font')
        .copy('resources/assets/font', 'public/font')
        .copy('resources/assets/font', 'public/build/font')

        // css
        .copy('bower_components/angular-material/angular-material.min.css', 'resources/assets/css/angular-material.min.css')
        .copy('bower_components/font-awesome/css/font-awesome.min.css', 'resources/assets/css/font-awesome.min.css')
        .copy('bower_components/video.js/dist/video-js.min.css', 'resources/assets/css/video-js.min.css')
        .styles([
            'font-awesome.min.css',
            'climacons-font.css',
            'angular-material.min.css',
            'video-js.min.css',
            'app.css'
        ])

        // javascript
        .copy('bower_components/angular/angular.min.js', 'resources/assets/js/angular.min.js')
        .copy('bower_components/angular-aria/angular-aria.min.js', 'resources/assets/js/angular-aria.min.js')
        .copy('bower_components/angular-animate/angular-animate.min.js', 'resources/assets/js/angular-animate.min.js')
        .copy('bower_components/angular-material/angular-material.min.js', 'resources/assets/js/angular-material.min.js')
        .copy('bower_components/skycons/skycons.js', 'resources/assets/js/skycons.js')
        .copy('bower_components/angular-skycons/angular-skycons.min.js', 'resources/assets/js/angular-skycons.min.js')
        .copy('bower_components/highcharts/lib/highcharts.js', 'resources/assets/js/highcharts.js')
        .copy('bower_components/highcharts/lib/adapters/standalone-framework.js', 'resources/assets/js/standalone-framework.js')
        .copy('bower_components/highcharts-ng/dist/highcharts-ng.min.js', 'resources/assets/js/highcharts-ng.min.js')
        .copy('bower_components/moment/min/moment.min.js', 'resources/assets/js/moment.min.js')
        .copy('bower_components/video.js/dist/video.min.js', 'resources/assets/js/video.min.js')
        .scripts([
            'angular.min.js',
            'angular-aria.min.js',
            'angular-animate.min.js',
            'angular-material.min.js',
            'justgage.js',
            'raphael-2.1.4.min.js',
            'skycons.js',
            'angular-skycons.min.js',
            'highcharts.js',
            'standalone-framework.js',
            'highcharts-ng.min.js',
            'moment.min.js',
            'video.min.js',
            'app.js',
            'filters.js',
            'controllers/navController.js',
            'controllers/homeController.js',
            'controllers/historyController.js',
            'controllers/webcamsController.js',
            'controllers/timelapseController.js'
        ])
        
        // swf
        .copy('bower_components/video.js/dist/video-js.swf', 'public/video-js.swf')

        .version([
            'css/all.css',
            'js/all.js'
        ])

        // img
        .copy('resources/assets/img', 'public/img')
        .copy('resources/assets/img', 'public/build/img')
    ;
    mix.phpUnit();
});
    