<?php
header('Content-Type: application/json');

// Database connection
require '../config/config.php';
$pdo = new PDO($dsn, $username, $password);

// Fetch products
$sql = 'SELECT id, name, price FROM products';
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return JSON response
echo json_encode($products);
