const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ]);

mix.browserSync({
    proxy: 'localhost:8000',
    host: '0.0.0.0',
    open: 'external',
    port: 3000,
    files: [
        'public/js/*.js',
        'public/css/*.css',
        'resources/views/**/*.blade.php',
    ],
    notify: false,
});
