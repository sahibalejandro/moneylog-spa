var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
require('./gulp/hot-reload');

elixir(function(mix) {
	mix.sass('app.scss');
    mix.browserify('app.js');
    mix.browserSync({
    	proxy: 'moneylog-spa.dev',
    	files: [
    		'app/**/*.php',
    		'public/css/**/*.css',
    		'resources/views/**/*.php',
    	],
    });
});
