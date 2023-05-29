<?php

return [

  

    // 'default' => env('MAIL_MAILER', 'smtp'),

   

    // 'mailers' => [
    //     'smtp' => [
    //         'transport' => 'smtp',
    //         'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    //         'port' => env('MAIL_PORT', 587),
    //         'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    //         'username' => env('MAIL_USERNAME'),
    //         'password' => env('MAIL_PASSWORD'),
    //         'timeout' => null,
    //         'auth_mode' => null,
    //     ],

    //     'ses' => [
    //         'transport' => 'ses',
    //     ],

    //     'mailgun' => [
    //         'transport' => 'mailgun',
    //     ],

    //     'postmark' => [
    //         'transport' => 'postmark',
    //     ],

    //     'sendmail' => [
    //         'transport' => 'sendmail',
    //         'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -t -i'),
    //     ],

    //     'log' => [
    //         'transport' => 'log',
    //         'channel' => env('MAIL_LOG_CHANNEL'),
    //     ],

    //     'array' => [
    //         'transport' => 'array',
    //     ],

    //     'failover' => [
    //         'transport' => 'failover',
    //         'mailers' => [
    //             'smtp',
    //             'log',
    //         ],
    //     ],
    // ],

    

    // 'from' => [
    //     'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
    //     'name' => env('MAIL_FROM_NAME', 'Example'),
    // ],

   

    // 'markdown' => [
    //     'theme' => 'default',

    //     'paths' => [
    //         resource_path('views/vendor/mail'),
    //     ],
    // ],




    
    // Mail Driver
    'driver' => env('MAIL_DRIVER', 'smtp'),

    // SMTP Host Address
    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    // SMTP Host Port
    'port' => env('MAIL_PORT', 587),

    // Global "From" Address
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', null),
        'name' => env('MAIL_FROM_NAME', null)
    ],

    // E-Mail Encryption Protocol
    'encryption' => env('MAIL_ENCRYPTION', null),

    // SMTP Server Username
    'username' => env('MAIL_USERNAME', null),

    // SMTP Server Password
    'password' => env('MAIL_PASSWORD', null),

    // Sendmail System Path
    'sendmail' => '/usr/sbin/sendmail -bs',

    // Mail "Pretend"
    'pretend' => env('MAIL_PRETEND', false),

];
