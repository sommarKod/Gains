/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


var elixir = require('laravel-elixir');

require('laravel-elixir-angular');
require('laravel-elixir-ngtemplatecache');

var bowerDir = './resources/assets/bower/';


bootstrap = './node_modules/bootstrap-sass/assets/';


elixir(function(mix) {

    mix.scripts([
              'jquery/dist/jquery.min.js',
              'bootstrap/dist/js/bootstrap.min.js',
              'angular/angular.js',
              "angular-route/angular-route.js",
              'angular-bootstrap/ui-bootstrap.min.js',
              'ng-sortable/dist/ng-sortable.min.js'
            ], 'public/js/all.js', bowerDir);


    mix.styles([
              'ng-sortable/dist/ng-sortable.min.css',
              'ng-sortable/dist/ng-sortable.style.min.css'
            ],'public/css/all.css', bowerDir);
    

    mix.angular("resources/assets/angular/", "public/js/", "angularApp.js");


    mix.ngTemplateCache('/**/*.html', 'public/js', 'resources/assets/angular', {
        templateCache: {
            standalone: true
        },
        htmlmin: {
            collapseWhitespace: true,
            removeComments: true
        }
    });
    mix.copy(bootstrap + 'fonts/**', 'public/fonts');
});



elixir(function(mix) {
    mix.sass('app.scss');
});
