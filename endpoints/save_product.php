<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/DVD.php';
require_once __DIR__ . '/../classes/Furniture.php';
require_once __DIR__ . '/../classes/Book.php';
require_once __DIR__ . '/../classes/ProductFactory.php';

// Initialize the database connection
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Database connection error");
}


// Retrieve form data
$sku          = $_POST['sku'] ?? null;
$name         = $_POST['name'] ?? null;
$price        = $_POST['price'] ?? null;
$product_type = $_POST['product_type'] ?? null;
$size         = $_POST['size'] ?? null;
$weight       = $_POST['weight'] ?? null;
$height       = $_POST['height'] ?? null;
$width        = $_POST['width'] ?? null;
$length       = $_POST['length'] ?? null;


// Validation
if (empty($sku) || empty($name) || empty($price) || empty($product_type)) {
    die("Required fields are missing.");
}

// Prepare specific data based on product type
$specificData = [];
switch ($product_type) {
    case 'DVD':
        $specificData['size'] = $size;
        break;
    case 'Book':
        $specificData['weight'] = $weight;
        break;
    case 'Furniture':
        $specificData['height'] = $height;
        $specificData['width'] = $width;
        $specificData['length'] = $length;
        break;
    default:
        die("Invalid product type.");
}

try {
    // Create the product instance using the factory
    $product = ProductFactory::create($db, $product_type, $sku, $name, $price, $specificData);

    // Save the product
    if ($product->save()) {
        // echo "Product and specific type data saved successfully.";
        header("Location: /");
        exit();
    } else {
        echo "Failed to save product data.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close database connection
$database = null;
