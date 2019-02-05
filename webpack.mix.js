let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
// //    .sass('resources/assets/sass/app.scss', 'public/css');


mix.combine([
    'resources/assets/front/templatemo_style.css',
],'public/css/front.css');

mix.copy('resources/assets/front/images', 'public/css/images');

mix.scripts([
    'resources/assets/front/js/jquery.js',
], 'public/js/front.js');