<?php

spl_autoload_register(function ($class_name) {
    $base_dir = __DIR__ . '/../'; // Base directory for your project

    // Define an array of possible directories for your classes
    $directories = ['classes/'];

    foreach ($directories as $directory) {
        $file = $base_dir . $directory . $class_name . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    throw new Exception("Unable to load class: $class_name");
});
