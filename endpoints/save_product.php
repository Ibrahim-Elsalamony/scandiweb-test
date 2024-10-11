<?php
require_once __DIR__ . '/../config/autoload.php';

try {
    $handler = new ProductHandler();
    $handler->handleRequest();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
