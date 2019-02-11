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
mix.copy('resources/assets/css/styles.css', 'public/js/main.js')
  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
// //   .styles([
// //   'resources/assets/css/styles.css'
// //   ], 'public/css/main.css')
// //   .scripts([
// //     'resources/assets/js/main.js'
// //   ], 'public/js/main.js');