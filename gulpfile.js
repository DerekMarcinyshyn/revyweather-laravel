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
        .copy('bower_components/font-awesome/fonts', 'public/fonts')
        .copy('bower_components/font-awesome/fonts', 'public/build/fonts')

        // css
        .copy('bower_components/angular-material/angular-material.min.css', 'resources/assets/css/angular-material.min.css')
        .copy('bower_components/font-awesome/css/font-awesome.min.css', 'resources/assets/css/font-awesome.min.css')
        .styles([
            'font-awesome.min.css',
            'angular-material.min.css',
            'app.css'
        ])

        // javascript
        .copy('bower_components/angular/angular.min.js', 'resources/assets/js/angular.min.js')
        .copy('bower_components/angular-aria/angular-aria.min.js', 'resources/assets/js/angular-aria.min.js')
        .copy('bower_components/angular-animate/angular-animate.min.js', 'resources/assets/js/angular-animate.min.js')
        .copy('bower_components/angular-material/angular-material.min.js', 'resources/assets/js/angular-material.min.js')
        .scripts([
            'angular.min.js',
            'angular-aria.min.js',
            'angular-animate.min.js',
            'angular-material.min.js',
            'app.js'
        ])

        .version([
            'css/all.css',
            'js/all.js'
        ])
    ;
    mix.phpUnit();
});
    