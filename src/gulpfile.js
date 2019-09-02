const { parallel, src, dest, watch } = require('gulp');
const babel = require('gulp-babel');

const rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    terser = require('gulp-terser'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    cssnano = require('cssnano'),
    tailwindcss = require('tailwindcss');
    // stylus = require('gulp-stylus'),
    // rupture = require('rupture'),
    // nib = require('nib');

// function styles() {
//     return src('stylus/init.styl')
//         .pipe(stylus({
//             'include css': true,
//             compress: true,
//             use: [nib(), rupture()]
//         }))
//         .pipe(rename({
//             basename: 'main',
//             suffix: '.min',
//             extname: ".css"
//         }))
//         .pipe(dest('../assets/css/'));
// }
function styles() {
    return src('scss/init.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            // require('tailwindcss'),
            tailwindcss('../tailwind.config.js'),
            autoprefixer(),
            cssnano()
        ]))
        .pipe(rename({
            basename: 'main',
            suffix: '.min',
            extname: ".css"
        }))
        .pipe(dest('../assets/css/'));    

    // return src('scss/init.scss')
    //     .pipe(sass().on('error', sass.logError))
    //     .pipe(rename({
    //         basename: 'main',
    //         suffix: '.min',
    //         extname: ".css"
    //     }))
    //     .pipe(dest('../assets/css/'));
}

function scripts() {
    return src('scripts/**/*.js')
        .pipe(babel())
        .pipe(concat('main.js'))
        .pipe(rename({ suffix: '.min', extname: ".js" }))
        .pipe(terser())
        .pipe(dest('../assets/js/'));
}

function watchScripts() {
    return watch('scripts/**/*.js', { ignoreInitial: false }, scripts);
}

function watchStyles() {
    return watch('scss/**/*.scss', { ignoreInitial: false }, styles);
}

exports.default = parallel(watchScripts, watchStyles);