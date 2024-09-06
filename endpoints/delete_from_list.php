<?php
// Include necessary files (assuming you have a file to handle database connection and ProductFactory)
require_once 'Database.php'; // Adjust the path as needed
require_once 'ProductFactory.php'; // Adjust the path as needed

// Initialize the database connection
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    echo json_encode(["success" => false, "message" => "Database connection error"]);
    exit();
}

// Retrieve the data sent from the frontend
$data = json_decode(file_get_contents('php://input'), true);
$productIds = $data['ids'] ?? [];

// Validate and sanitize input data
if (!is_array($productIds) || empty($productIds)) {
    echo json_encode(["success" => false, "message" => "No products selected or invalid data."]);
    exit();
}

foreach ($productIds as $id) {
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo json_encode(["success" => false, "message" => "Invalid product ID: $id."]);
        exit();
    }
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
