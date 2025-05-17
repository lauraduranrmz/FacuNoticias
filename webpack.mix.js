const mix = require('laravel-mix');

// Configuración para React
mix.react('resources/js/app.js', 'public/js')
   .sass('resources/css/app.scss', 'public/css')
   .version(); // Opcional: añade versionado para cache