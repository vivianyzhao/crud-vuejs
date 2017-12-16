let mix = require('laravel-mix');

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

let npmDir = 'node_modules/',
	jsDir = 'resources/assets/js'

// mix.copy(npmDir + 'vue/dist/vue.min.js', jsDir);
// mix.copy(npmDir + 'vue-resource/dist/vue-resource.min.js', jsDir);

mix.scripts([
    npmDir + 'vue/dist/vue.min.js',
    npmDir + 'vue-resource/dist/vue-resource.min.js'
], 'public/js/vendor.js');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
