<?php

$start = microtime(true);
$root = dirname(__DIR__);
require $root.'/vendor/autoload.php';

$config = array_replace_recursive(
    [
        'START'         => $start,
        'BASE_URL'      => 'http://'.filter_input(INPUT_SERVER, 'SERVER_NAME'),
        'ENVIRONMENT'   => 'production',
        'DEBUG'         => 0,
        'ROOT'          => $root,
        'APP'           => $root.'/app',
        'CONFIG'        => $root.'/config',
        'PUBLIC'        => $root.'/public',
        'RESOURCES'     => $root.'/resources',
        'STORAGE'       => $root.'/storage',
        'EMAIL_FROM'    => 'no-reply@example.com',
    ],
    (file_exists($root.'/.env') ? parse_ini_file($root.'/.env') : []),
    require($root.'/config/app.php')
);

(new \App\App($config))->run();
