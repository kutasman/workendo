const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(function(mix){
    mix
        .copy('node_modules/font-awesome/fonts','public/fonts')
        .copy('node_modules/pickadate/lib/themes/default.css', 'resources/assets/css/pickadate/default.css')
        .copy('node_modules/pickadate/lib/themes/default.date.css', 'resources/assets/css/pickadate/default.date.css')
        .copy('node_modules/pickadate/lib/picker.js', 'resources/assets/js/pickadate/picker.js')
        .copy('node_modules/pickadate/lib/picker.date.js', 'resources/assets/js/pickadate/picker.date.js')
        .styles(['pickadate/default.css', 'pickadate/default.date.css'], 'public/css/pickadate.css')
        .scripts(['pickadate/picker.js', 'pickadate/picker.date.js', 'pickadate/init-picker.js'], 'public/js/pickadate.js')
        .sass('app.scss')
        .webpack('app.js');
});
