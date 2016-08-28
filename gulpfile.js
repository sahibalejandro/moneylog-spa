var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
require('./gulp/hot-reload');

elixir(function(mix) {

    mix.styles([
        './node_modules/sweetalert2/dist/sweetalert2.min.css'
    ], 'public/css/app.css');

    mix.browserify('app.js');
});
