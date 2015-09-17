var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    //mix.sass('app.scss');

    mix.styles([
        'bootstrap.css',
        'main.css',
    ]);

    mix.scripts([
            'jquery.js',
            'bootstrap.js',
            'ZeroClipboard.js',
            'jquery.form-validator.js',
            'main.js',
            'mydns.js',
        ]);
});
