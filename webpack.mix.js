const mix = require('laravel-mix');

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
mix.webpackConfig({
    resolve: {
        extensions: ['.vue', '.js', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': path.resolve(__dirname, 'resources/js')
        },
    },
})

mix.js(['resources/js/main.js'], 'public/js/app.js').sass('resources/sass/app.scss', 'public/css');

mix.styles('resources/sass/custom.css', 'public/css/all.css');

mix.js('resources/js/search.js', 'public/js/search.js');

mix.js('resources/js/post.js', 'public/js/post.js');

mix.js('resources/js/custom.js', 'public/js/all.js');
