<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';

// Initialize the database connection
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die(json_encode(["success" => false, "message" => "Database connection error"]));
}


header('Content-Type: application/json'); // Ensure the response is JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'];

    try {
        // Create a new Database instance
        $database = new Database();
        $pdo = $database->getConnection();

        // Prepare and execute the query to check if SKU exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE sku = ?");
        $stmt->execute([$sku]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo json_encode(['exists' => true]);
        } else {
            echo json_encode(['exists' => false]);
        }
    } catch (PDOException $e) {
        // Return a JSON error response in case of an exception
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Return a JSON error response if the request method is not POST
    echo json_encode(['error' => 'Invalid request method']);
}
