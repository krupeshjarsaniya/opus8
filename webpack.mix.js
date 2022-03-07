const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/assets/js/app.js", "public/assets/js");
mix.sass("resources/assets/css/app.scss", "public/assets/css");
mix.css("resources/assets/css/style.css", "public/assets/css");
mix.css("resources/assets/fonts/stylesheet.css", "public/assets/fonts");
mix.copyDirectory("resources/assets/images", "public/assets/images");
mix.copyDirectory("resources/assets/vendor", "public/assets/vendor");
mix.copy("resources/assets/fonts/", "public/assets/fonts");

mix.styles([
    "resources/assets/vendor/dropzone/css/dropzone.min.css",
    "resources/assets/vendor/audio/css/main.css",
    "resources/assets/vendor/toastr/toastr.min.css",
    "resources/assets/vendor/jquery-confirm/css/jquery-confirm.min.css",
], "public/assets/css/vendor.css");

mix.scripts([
    "resources/assets/js/popper.min.js",
    "resources/assets/vendor/toastr/toastr.min.js",
    "resources/assets/vendor/dropzone/js/dropzone.min.js",
    "resources/assets/vendor/jqueryvaildation/js/jquery.validate.min.js",
    "resources/assets/vendor/jqueryvaildation/js/additional-methods.min.js",
    "resources/assets/vendor/jquery-confirm/js/jquery-confirm.min.js",
    "resources/assets/vendor/audio/js/jaudio.js",
], "public/assets/js/vendor.js");