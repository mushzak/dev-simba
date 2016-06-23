<?php

return [
    '/' => [App\Controllers\FrontPage::class, 'index'],
    '/questionnaire' => [
        '/'             => [App\Controllers\Questionnaire::class, 'index'],
        '/individuals/' => [App\Controllers\Questionnaire::class, 'individuals'],
        '/institutions/' => [App\Controllers\Questionnaire::class, 'institutions'],
        '/post'         => ['on' => 'POST', 'do' => [App\Controllers\Questionnaire::class, 'post']],
        '/plan'         => [App\Controllers\Questionnaire::class, 'plan'],
    ],
    '/account'  => [
        '/'             => [App\Controllers\Account::class, 'index'],
        '/confirm-email/{code:.+}'  => [App\Controllers\Account::class, 'confirmEmail'],
    ]
];
