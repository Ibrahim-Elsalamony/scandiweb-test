<?php

// Database configuration settings
define('DB_HOST', 'localhost');   // The hostname of your database server
define('DB_NAME', 'scandiweb-test');   // The name of your database
define('DB_USER', 'root');   // Your database username
define('DB_PASS', '');   // Your database password

// Optional: Other configuration settings
define('DB_CHARSET', 'utf8mb4');  // The character set for the database connection
define('DB_PORT', 3306);          // The port number for the database connection (default is 3306)

// Error reporting settings (development environment)
error_reporting(E_ALL);
ini_set('display_errors', 1);
