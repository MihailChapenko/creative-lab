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

mix.js('resources/assets/js/jquery-3.1.1.min.js', 'js/jquery.min.js')
    .js('resources/assets/js/bootstrap.min.js', 'js/bootstrap.min.js')
    .js('resources/assets/js/jquery-ui.min.js', 'js/jquery-ui.min.js')
    .js('resources/assets/js/material.min.js', 'js/material.min.js')
    .js('resources/assets/js/perfect-scrollbar.jquery.min.js', 'js/perfect-scrollbar.jquery.min.js')
    .js('resources/assets/js/jquery.validate.min.js', 'js/jquery.validate.min.js')
    .js('resources/assets/js/chartist.min.js', 'js/chartist.min.js')
    .js('resources/assets/js/jquery.bootstrap-wizard.js', 'js/jquery.bootstrap-wizard.min.js')
    .js('resources/assets/js/bootstrap-notify.js', 'js/bootstrap-notify.min.js')
    .js('resources/assets/js/jquery.sharrre.js', 'js/jquery.sharrre.min.js')
    .js('resources/assets/js/jquery-jvectormap.js', 'js/jquery-jvectormap.min.js')
    .js('resources/assets/js/nouislider.min.js', 'js/nouislider.min.js')
    .js('resources/assets/js/jquery.select-bootstrap.js', 'js/jquery.select-bootstrap.min.js')
    .js('resources/assets/js/sweetalert2.js', 'js/sweetalert2.min.js')
    .js('resources/assets/js/jasny-bootstrap.min.js', 'js/jasny-bootstrap.min.js')
    .js('resources/assets/js/jquery.tagsinput.js', 'js/jquery.tagsinput.min.js')
    .js('resources/assets/js/material-dashboard.js', 'js/material-dashboard.min.js')
    .copy('resources/assets/css/bootstrap.min.css', 'public/css')
    .sass('resources/assets/css/font-awesome.min.css', 'public/css')
    .sass('resources/assets/css/material-dashboard.css', 'public/css')
    .copy('resources/assets/css/google-roboto-300-700.css', 'public/css')
    .copy('resources/assets/js/fullcalendar.min.js', 'public/js')
    .copy('resources/assets/js/bootstrap-datetimepicker.js', 'public/js')
    .copy('resources/assets/js/jquery.datatables.js', 'public/js')
    .copy('resources/assets/js/moment.min.js', 'public/js')
    .copy('resources/assets/fonts/**/*.*', 'public/fonts')
    .copy('resources/assets/img/**/*.*', 'public/img');
