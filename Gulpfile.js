var gulp = require('gulp');
var notify = require('gulp-notify');
var codecept = require('gulp-codeception');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('dev', function() {

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