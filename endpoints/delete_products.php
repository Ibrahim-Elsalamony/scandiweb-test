<?php
require_once __DIR__ . '/../config/autoload.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    throw new Exception("Database connection error");
}

$data = json_decode(file_get_contents('php://input'), true);
$productIds = $data['ids'] ?? null;

if (empty($productIds) || !is_array($productIds)) {
    echo json_encode(["success" => false, "message" => "No products selected or invalid data."]);
    exit();
}

$db->beginTransaction();

try {
    foreach ($productIds as $id) {
        $product = ProductFactory::makeDelete($db, $id);
        if (!$product->delete()) {
            throw new Exception("Failed to delete product with ID $id.");
        }
    }

    $db->commit();
    echo json_encode(["success" => true, "message" => "Products successfully deleted!"]);
} catch (Exception $e) {
    $db->rollBack();
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}

$database = null;
