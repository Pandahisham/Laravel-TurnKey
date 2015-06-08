<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    */

    'model' => 'App\User',

    /*
    |--------------------------------------------------------------------------
    | Login Identifier (username, email, etc.)
    |--------------------------------------------------------------------------
    */

    'identifier' => 'email',

    /*
    |--------------------------------------------------------------------------
    | Feedback form settings
    |--------------------------------------------------------------------------
    */

    'feedback' => [
        'active'  => true,
        'subject' => 'Feedback by lost customer',
        'view'    => 'turnkey::feedback-mail',
        'email'   => 'feedback@myapp.io',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form and Status page URLs
    |--------------------------------------------------------------------------
    */

    'urls' => [
        'index'   => '/account/close',
        'handle'  => '/account/close',
        'goodbye' => '/account/close/success',
        'staying' => '/account/close/failure',

        'feedback'        => '/account/close/feedback',
        'feedback-handle' => '/account/close/feedback',
    ],

];
