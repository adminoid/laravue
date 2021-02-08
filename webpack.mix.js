const mix = require('laravel-mix');

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

mix.js('resources/js/admin-area/app.js', 'public/js/admin-area')
    .js('resources/js/frontend/app.js', 'public/js/frontend')
    .vue()
    .sass('resources/sass/admin-area/app.scss', 'public/css/admin-area')
    .sass('resources/sass/frontend/app.scss', 'public/css/frontend');
