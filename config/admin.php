<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin credentials (for simple session-based login)
    |--------------------------------------------------------------------------
    | Set ADMIN_EMAIL and ADMIN_PASSWORD in .env for production.
    */

    'email' => env('ADMIN_EMAIL', 'admin@example.com'),
    'password' => env('ADMIN_PASSWORD', 'password'),
    'name' => env('ADMIN_NAME', 'Admin'),

];
