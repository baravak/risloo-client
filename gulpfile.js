const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
const minify = require('gulp-minify');
const concat = require('gulp-concat');

function css() {
    return src('resources/sass/app.scss')
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(dest('public/css'))
}

function js() {
    return src('resources/js/app/**/*.js', {sourcemaps: true})
        .pipe(concat('app.js'))
        .pipe(minify({
            ext: {
                min: '.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}

function dashboardJs() {
    return src('resources/js/dashboard/**/*.js', { sourcemaps: true })
        .pipe(concat('dashboard.js'))
        .pipe(minify({
            ext: {
                min: '.js'
            },
        }))
        .pipe(dest('public/js', { sourcemaps: false }))
}
function watchFile()
{
    watch('resources/sass/**/*.scss', css);
    watch('resources/js/app/**/*.js', js);
    watch('resources/js/dashboard/**/*.js', dashboardJs);
}
exports.js = js;
exports.css = css;
exports.watchFile = watchFile;
exports.default = parallel(js, dashboardJs, css, watchFile);
