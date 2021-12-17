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
        'client_id' => '473681730393854',  //client face của bạn
        'client_secret' => '113e1414186d42ea17bde1c7592f98b6',  //client app service face của bạn
        'redirect' => 'http://leminh.com:8080/laravel_8/theshoes/dang-nhap/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '240650606698-m15el4gatho50aulk4pskg74bv7flcnu.apps.googleusercontent.com',  //client face của bạn
        'client_secret' => 'pOcFouOlEjZR5O2bno7XngxV',  //client app service face của bạn
        'redirect' => 'http://127.0.0.1:8000/google/callback' //callback trả về
    ],

];
