<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '834236634453397',
        'client_secret' => '7437739cc1412f0e5608507b6e6cb0fb',
        'redirect' => 'http://localhost:8000/callback',
    ],

    'google' => [
        'client_id' => '235105181202-4gldscm1nqh9mk1v29jefqu8ub7c620d.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/callbackGoogle',
    ],
];