const { src, dest, watch } = require('gulp');
// const sass = require('gulp-sass');
// const minifyCSS = require('gulp-csso');
const concat = require('gulp-concat');

function css() {
    return src('src/scss/sarkoot.scss')
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(dest('dist/css'))
}

function js() {
    return src('resources/js/**/*.js', { sourcemaps: true })
        .pipe(concat('app.js'))
        .pipe(dest('public/js', { sourcemaps: true }))
}

exports.js = js;
// exports.css = css;
exports.default = function () {
    // watch('src/scss/**/*.scss', css);
    watch('resources/js/**/*.js', js);
}
