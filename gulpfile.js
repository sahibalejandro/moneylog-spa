var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir.config.js.browserify.plugins.push({
    name: 'browserify-hmr',
    options: {},
});

elixir(function(mix) {
    mix.browserify('main.js');
});
