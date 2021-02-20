const mix = require('laravel-mix');
const config = require('./webpack.config');

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

mix.ts('resources/ts/admin-area/app.ts', 'public/js/admin-area')
    .js('resources/js/frontend/app.js', 'public/js/frontend')
    .vue()
    .sourceMaps()
    .sass('resources/sass/admin-area/app.sass', 'public/css/admin-area')
    .sass('resources/sass/frontend/app.sass', 'public/css/frontend');

mix.webpackConfig(config);
