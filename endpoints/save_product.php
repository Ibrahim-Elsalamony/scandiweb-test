<?php
// Include necessary classes
require_once '../classes/Database.php';
require_once '../classes/DVD.php';
require_once '../classes/Furniture.php';
require_once '../classes/Book.php';

// Create a Database instance
$database = new Database();
$db = $database->getConnection();

// Get the product type from the request
$productType = $_POST['type'] ?? null;

if ($productType) {
    switch ($productType) {
        case 'DVD':
            $product = new DVD($db, $_POST['name'], $_POST['price'], $_POST['size'], $_POST['id']);
            break;
        case 'furniture':
            $product = new Furniture($db, $_POST['name'], $_POST['price'], $_POST['height'], $_POST['width'], $_POST['length'], $_POST['id']);
            break;
        case 'book':
            $product = new Book($db, $_POST['name'], $_POST['price'], $_POST['weight'], $_POST['id']);
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
