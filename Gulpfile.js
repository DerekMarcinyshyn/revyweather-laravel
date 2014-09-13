var gulp = require('gulp');
var notify = require('gulp-notify');
var codecept = require('gulp-codeception');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var minifyCSS = require('gulp-minify-css');
var autoprefix = require('gulp-autoprefixer');

var paths = {
    css: [
        'app/assets/css/font-awesome.min.css',
        'app/assets/css/bootstrap.min.css',
        'app/assets/css/climacons-font.css',
        'app/assets/css/jquery.fancybox.css',
        'app/assets/css/app.css'
    ],
    js: [
        'app/assets/js/jquery.min.js',
        'app/assets/js/jquery.mousewheel-3.0.6.pack.js',
        'app/assets/js/bootstrap.min.js',
        'app/assets/js/fancybox/jquery.fancybox.pack.js',
        'app/assets/js/angular.min.js',
        'app/assets/js/ui-bootstrap-tpls-0.11.0.min.js',
        'app/assets/js/angular.skycons.js',
        'app/assets/js/skycons.js',
        'app/assets/js/raphael.2.1.0.min.js',
        'app/assets/js/justgage.1.0.1.js',
        'app/assets/js/index.js'
    ]
};

gulp.task('dev_js', function() {
    gulp.src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('app.min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/js'))
        .pipe(notify({
            title: 'Success',
            message: 'Javascript development built'
        }))
});

gulp.task('build_js', function() {
    gulp.src(paths.js)
        .pipe(concat('app.min.js'))
        .pipe(uglify({mangle: false}))
        .pipe(gulp.dest('public/assets/js'))
        .pipe(notify({
            title: 'Success',
            message: 'Javascript production built'
        }))
});

gulp.task('dev_css', function() {
    gulp.src(paths.css)
        .pipe(sourcemaps.init())
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS development built'
        }))
});

gulp.task('build_css', function() {
    gulp.src(paths.css)
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(minifyCSS({keepSpecialComments:0}))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS production built'
        }))
});


gulp.task('test', function() {
    gulp.src('tests/**/*.php')
        .pipe(codecept('', {notify: true}))
        .on('error', notify.onError({
            title: 'Shit',
            message: 'Your tests failed, Derek',
            icon: __dirname + '/fail.gif'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests have returned green!'
        }))
});

gulp.task('watch', function() {
    gulp.watch(['tests/**/*.php', 'app/**/*.php'], ['test']);
    gulp.watch(['app/assets/css/*.css'], ['dev_css']);
    gulp.watch(['app/assets/js/*.js'], ['dev_js']);
});

gulp.task('default', ['test', 'watch']);
gulp.task('production', ['build_css', 'build_js', 'test']);