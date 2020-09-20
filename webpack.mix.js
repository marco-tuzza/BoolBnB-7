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

mix.js('resources/js/appartment.js', 'public/js').js('resources/js/welcome.js', 'public/js').js('resources/js/dashboard.js', 'public/js').js('resources/js/caratteristiche.js', 'public/js').js('resources/js/pagamenti.js', 'public/js').js('resources/js/stats.js', 'public/js').js('resources/js/register.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
