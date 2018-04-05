"use strict";

var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gulpif = require('gulp-if'),
    arg = require('yargs')
        .alias('d', 'dev')
        .argv,

    config = {
        js: {
            src: [
                './src/js/app.js'
            ],
            dest: './dist/.',
            watch: './src/js/**/*.js',
            destFile: 'pug.q.js'
        }
    };

gulp.task('js', function () {
    return gulp.src(config.js.src)
        .on('error', function(e) {
            console.log('>>> ERROR', e.message);
            this.emit('end');
        })
        .pipe(concat(config.js.destFile))
        .pipe(
            gulpif(!arg.dev, uglify())
        )
        .pipe(gulp.dest(config.js.dest));
});

gulp.task('js:watch', function () {
    arg.dev = true;
    gulp.watch(config.js.watch, gulp.series('js'));
});

gulp.task('default', gulp.parallel('js'));
gulp.task('watch', gulp.parallel('js:watch'));
