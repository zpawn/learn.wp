"use strict";

var gulp = require('gulp'),

    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    csso = require('gulp-csso'),

    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),

    gulpif = require('gulp-if'),
    arg = require('yargs')
        .alias('d', 'dev')
        .argv,

    config = {
        path: {
            sass: {
                src: './src/scss/app.scss',
                dest: './dist/.',
                watch: './src/scss/**/*.scss'
            },
            js: {
                src: [
                    './src/js/FullPageSearch.js',
                    './src/js/*.js'
                ],
                dest: './dist/.',
                watch: './src/js/**/*.js'
            }
        },
        browser: ["last 2 versions"],
        csso: {
            comments: false,
            sourceMap: false
        }
    };

gulp.task('sass', function () {

    return gulp.src(config.path.sass.src)
        .pipe(concat('fulltext.search.css'))
        .pipe(
            gulpif(arg.dev, sourcemaps.init())
        )
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer(config.browser))
        .pipe(
            gulpif(arg.dev, sourcemaps.write())
        )
        .pipe(
            gulpif(!arg.dev, csso(config.csso))
        )
        .pipe(gulp.dest(config.path.sass.dest));
});

gulp.task('sass:watch', function () {
    arg.dev = true;
    gulp.watch(config.path.sass.watch, gulp.series('sass'));
});

gulp.task('js', function () {
    return gulp.src(config.path.js.src)
        .pipe(
            gulpif(arg.dev, sourcemaps.init())
        )
        .on('error', function(e) {
            console.log('>>> ERROR', e.message);
            this.emit('end');
        })
        .pipe(concat('fulltext.search.js'))
        .pipe(
            gulpif(arg.dev, sourcemaps.write())
        )
        .pipe(
            gulpif(!arg.dev, uglify())
        )
        .pipe(gulp.dest(config.path.js.dest));
});

gulp.task('js:watch', function () {
    arg.dev = true;
    gulp.watch(config.path.js.watch, gulp.series('js'));
});

gulp.task('default', gulp.parallel('sass', 'js'));
gulp.task('watch', gulp.parallel('sass:watch', 'js:watch'));
