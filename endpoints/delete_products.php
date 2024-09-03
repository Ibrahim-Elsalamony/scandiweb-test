<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/DVD.php';
require_once __DIR__ . '/../classes/Book.php';
require_once __DIR__ . '/../classes/Furniture.php';
require_once __DIR__ . '/../classes/ProductFactory.php';

// Initialize the database connection
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die(json_encode(["success" => false, "message" => "Database connection error"]));
}

// Retrieve the data sent from the frontend
$data = json_decode(file_get_contents('php://input'), true);
$productIds = $data['ids'] ?? null;

// Validate input data
if (empty($productIds) || !is_array($productIds)) {
    echo json_encode(["success" => false, "message" => "No products selected or invalid data."]);
    exit();
}

// Begin transaction
$db->beginTransaction();

try {
    foreach ($productIds as $id) {
        $product = ProductFactory::makeDelete($db, $id);
        if (!$product->delete()) {
            throw new Exception("Failed to delete product with ID $id.");
        }
    }

    // Commit transaction
    $db->commit();
    echo json_encode(["success" => true, "message" => "Products successfully deleted!"]);
} catch (Exception $e) {
    // Rollback transaction in case of error
    $db->rollBack();
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}

// Close database connection
$database = null;
