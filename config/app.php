<?php

return [
    
    'title' => 'Blog Asombroso',

    'locale' => 'es',

    'assets_url' => 'public/',

    'time_zone' => 'America/Lima',

    'production' => false, // true = debug | false = no debug

    'url_app' => null, // http://localhost || puede ser null

    'url_folder' => null, // /mi-framework/ || puede ser null
    
    'views_path' => 'views',

    'partials_path' => 'partials',
    
    'partials' => [
        'layout' => 'layouts/main',
        'header' => 'ini-header',
        'scripts' => 'ini-scripts',
    ],

    'compiled' => ''

];