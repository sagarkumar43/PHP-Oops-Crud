<?php
// config/config.php
// Main Application Configuration

return [
    'app_name' => 'OOPS CRUD APP',
    'base_url' => 'http://localhost/PHP-OOP-CRUD/public/',
    'time_zone' => 'Asia/Kolkata',

    // Session Configuration
    'session' => [
        'name' => 'OOPS_CRUD_SESSION',
        'lifetime' => 7200 // 2 hours in seconds
    ],

    // Paths
    'paths' => [
        'root' => dirname(__DIR__),
        'app' => dirname(__DIR__). '/app',
        'view' => dirname(__DIR__). '/view',
        'public' => dirname(__DIR__). '/public'
    ]
];