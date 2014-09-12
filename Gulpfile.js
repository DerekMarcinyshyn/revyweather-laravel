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
        'public/assets/css/src/font-awesome.min.css',
        'public/assets/css/src/bootstrap.min.css',
        'public/assets/css/src/climacons-font.css',
        'public/assets/css/src/app.css'
    ]
};

gulp.task('dev', function() {
    gulp.src(paths.css)
        .pipe(sourcemaps.init())
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS built'
        }))
});

gulp.task('build', function() {
    gulp.src(paths.css)
        .pipe(concat('app.min.css'))
        .pipe(autoprefix('last 10 version'))
        .pipe(minifyCSS({keepSpecialComments:0}))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({
            title: 'Success',
            message: 'CSS built'
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
});

gulp.task('default', ['test', 'watch']);