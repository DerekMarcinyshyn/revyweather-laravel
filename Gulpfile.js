var gulp = require('gulp');
var notify = require('gulp-notify');
var codecept = require('gulp-codeception');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var minifyCSS = require('gulp-minify-css');
var autoprefix = require('gulp-autoprefixer');
var rev = require('gulp-rev');
var rename = require('gulp-rename');
var clean = require('gulp-clean');
var jshint = require('gulp-jshint');
var runSequence = require('run-sequence');



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
    ],
    clean: [
        'public/assets/css',
        'public/assets/js',
        'app/assets/manifest'
    ]
};

gulp.task('clean', function() {
    return gulp.src(paths.clean)
        .pipe(clean())
        .pipe(notify({
            title: 'Success',
            message: 'Cleaned folders!'
        }));
});

gulp.task('dev_js', function() {
    return gulp.src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('app.min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/js'))
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(notify({
            title: 'Success',
            message: 'Javascript development built'
        }));
});

gulp.task('production_js', function() {
    return gulp.src(paths.js)
        .pipe(concat('app.min.js'))
        .pipe(uglify({mangle: false}))
        .pipe(rev())
        .pipe(gulp.dest('public/assets/js'))
        .pipe(rev.manifest())
        .pipe(rename('js.manifest.json'))
        .pipe(gulp.dest('app/assets/manifest'))
        .pipe(notify({
            title: 'Success',
            message: 'Javascript production built'
        }));
});

gulp.task('dev_css', function() {
    return gulp.src(paths.css)
        .pipe(sourcemaps.init())
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS development built'
        }));
});

gulp.task('production_css', function() {
    return gulp.src(paths.css)
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(minifyCSS({keepSpecialComments:0}))
        .pipe(rev())
        .pipe(gulp.dest('public/assets/css'))
        .pipe(rev.manifest())
        .pipe(rename('css.manifest.json'))
        .pipe(gulp.dest('app/assets/manifest'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS production built'
        }));
});


gulp.task('test', function() {
    return gulp.src('tests/**/*.php')
        .pipe(codecept('', {notify: true}))
        .on('error', notify.onError({
            title: 'Shit',
            message: 'Your tests failed, Derek',
            icon: __dirname + '/fail.gif'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests have returned green!'
        }));
});

gulp.task('build', function() {
    runSequence('clean',
        ['dev_css', 'dev_js'],
        'test');
});

gulp.task('watch', function() {
    gulp.watch(['tests/**/*.php', 'app/**/*.php'], ['test']);
    gulp.watch(['app/assets/css/*.css'], ['dev_css']);
    gulp.watch(['app/assets/js/*.js'], ['dev_js']);
});

gulp.task('default', ['build', 'watch']);

gulp.task('production', function() {
    runSequence(
        ['production_css', 'production_js'],
        'test'
    );
});