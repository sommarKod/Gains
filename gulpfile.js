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

var paths = {
	'bootstrap': './node_modules/bootstrap-sass/assets/',
  'bower': './resources/assets/bower/'
}

elixir(function(mix) {

    // Bower scripts
    mix.scripts([
			        'jquery/dist/jquery.js',
              'angular/angular.js',
              "angular-route/angular-route.js",
              'angular-bootstrap/ui-bootstrap.min.js',
              'ng-sortable/dist/ng-sortable.min.js'
            ], 'public/js/all.js', paths.bower);

    // Bower styles
    mix.styles([
              'ng-sortable/dist/ng-sortable.min.css',
              'ng-sortable/dist/ng-sortable.style.min.css'
            ],'public/css/all.css', paths.bower);


    // Angular scripts
    mix.angular("resources/assets/angular/", "public/js/", "angularApp.js");

    // Angular template cache
    mix.ngTemplateCache('/**/*.html', 'public/js', 'resources/assets/angular', {
        templateCache: {
            standalone: true
        },
        htmlmin: {
            collapseWhitespace: true,
            removeComments: true
        }
    });

    // Bootstrap
    mix.sass("app.scss", 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
    .scripts([
        'javascripts/bootstrap.js'
    ], 'public/js/bootstrapApp.js', paths.bootstrap);

});
