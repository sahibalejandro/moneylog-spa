var elixir = require('laravel-elixir');

if (process.argv.indexOf('watch') > -1) {
    elixir.config.js.browserify.plugins.push({
        name: 'browserify-hmr',
        options: {},
    });
}
