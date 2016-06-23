<?php

return [
    'logger' => [
        'class' => App\FileLogger::class,
        '%1'    => '%STORAGE%/logs',
        '%2'    => '%ROOT%/',
    ],
    'view' => [
        'class' => R2\Templating\Dirk::class,
        '#1' => [
            'views'     => '%RESOURCES%/views',
            'cache'     => '%STORAGE%/framework/views',
            'ext'       => '.blade.php'
        ],
    ],
    'db' => [
        'class' => R2\DBAL\PDOMySQL::class,
        '#1' => [
            'host'     => '%DB_HOST%',
            'username' => '%DB_USER%',
            'password' => '%DB_PASSWORD%',
            'dbname'   => '%DB_DATABASE%',
            'prefix'   => '%DB_PREFIX%',
        ]
    ],
    'auth' => [
        'class' => R2\Security\WordPress\Auth::class,
        '#1' => '@db',
        '#2' => [
            'site_url'      => '%SITE_URL%',
            'LOGGED_IN_KEY' => '%LOGGED_IN_KEY%',
            'LOGGED_IN_SALT'=> '%LOGGED_IN_SALT%',
            'NONCE_KEY'     => '%NONCE_KEY%',
            'NONCE_SALT'    => '%NONCE_SALT%',
        ],
    ],
    'user' => '@auth:getCurrentUser',
];
