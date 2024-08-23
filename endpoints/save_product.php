<?php
// Include necessary classes
require_once 'Database.php';
require_once 'Electronics.php';
require_once 'Clothing.php';

// Create a Database instance
$database = new Database();
$db = $database->getConnection();

// Get the product type from the request
$productType = $_POST['type'] ?? null;

if ($productType) {
    switch ($productType) {
        case 'electronics':
            $product = new Electronics($db, $_POST['name'], $_POST['price'], $_POST['warranty'], $_POST['id']);
            break;
        case 'clothing':
            $product = new Clothing($db, $_POST['name'], $_POST['price'], $_POST['size'], $_POST['id']);
            break;
        default:
            echo json_encode(["message" => "Invalid product type."]);
            exit;
    }

    // Save the product using the appropriate class
    try {
        $product->save();
        echo json_encode(["message" => "Product saved successfully."]);
    } catch (Exception $e) {
        echo json_encode(["message" => "Error saving product: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["message" => "No product type specified."]);
}
