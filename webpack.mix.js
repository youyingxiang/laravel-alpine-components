const tailwindcss = require('tailwindcss');

const mix = require('laravel-mix');

mix.setPublicPath('resources/dist')
mix.setResourceRoot('resources/assets')
mix.sourceMaps()
mix.version()


mix.js('resources/assets/js/app.js', 'resources/dist')

mix.postCss('resources/assets/css/app.css', 'resources/dist', [
    tailwindcss('tailwind.config.js'),
]).options({
    processCssUrls: false,
})