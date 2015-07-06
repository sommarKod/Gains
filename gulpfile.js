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

/*elixir(function(mix) {
    mix.sass('app.scss');
});*/

var elixir = require('laravel-elixir');

require('laravel-elixir-angular');

var bowerDir = './resources/assets/bower/';

elixir(function(mix) {
    mix.scripts([
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js'
            ], 'public/js/all.js', bowerDir);
    mix.angular();

});
