const { src, dest, watch, parallel } = require('gulp');
const minify = require('gulp-minify');
const concat = require('gulp-concat');

function js() {
    return src('resources/js/app/*.js', {sourcemaps: true})
        .pipe(concat('app.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}

function dashboardJs() {
    return src('resources/js/dashboard/**/*.js', { sourcemaps: true })
        .pipe(concat('dashboard.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}

function DavatJs() {
    return src('resources/davat/js/dashboard/**/*.js', { sourcemaps: true })
        .pipe(concat('davat.dashboard.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}

function sampleEngine() {
    return src('resources/js/sampleEngine.js', { sourcemaps: true })
        .pipe(concat('sampleEngine.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}
function watchFile()
{
    watch('resources/js/app/*.js', js);
    watch('resources/js/dashboard/**/*.js', dashboardJs);
    watch('resources/davat/js/dashboard/**/*.js', DavatJs);
    watch('resources/js/sampleEngine.js', sampleEngine);
}
exports.js = js;
exports.watchFile = watchFile;
exports.default = parallel(js, dashboardJs, DavatJs, sampleEngine, watchFile);
