<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/DVD.php';
require_once __DIR__ . '/../classes/Furniture.php';
require_once __DIR__ . '/../classes/Book.php';

// // Initialize the database connection
// $database = new Database();
// $db = $database->getConnection();

// if (!$db) {
//     header('Content-Type: application/json');
//     echo json_encode(['success' => false, 'message' => 'Database connection error']);
//     exit();
// }




// // Hard-coded JSON data
// $jsonData = '{"sku":"testSku","name":"testName","price":"3","type":"Furniture","size":"","height":"3","width":"3","length":"3","weight":""}';
// Read the JSON data from the request body
$input = file_get_contents('php://input');

// Check if data was read successfully
if ($input === false) {
    echo "Failed to read input data.";
} else {
    echo "Raw input data:\n" . $input; // Output raw input data for verification
}

// // Decode the JSON data
// $data = json_decode($input, true);

// // Check if decoding was successful
// if (json_last_error() === JSON_ERROR_NONE) {
//     // Response message
//     $response = array(
//         'success' => true,
//         'message' => 'JSON data decoded successfully!',
//         'data' => $data
//     );
// } else {
//     // Handle JSON decode errors
//     $response = array(
//         'success' => false,
//         'message' => 'Failed to decode JSON data.',
//         'error' => json_last_error_msg() // Include error message for debugging
//     );
// }

// // Send the JSON response
// echo json_encode($response);




// if (!$data) {
//     header('Content-Type: application/json');
//     echo json_encode(['success' => false, 'message' => 'Invalid input data']);
//     exit();
// }

// // Retrieve form data from JSON payload
// $sku = $data['sku'] ?? null;
// $name = $data['name'] ?? null;
// $price = $data['price'] ?? null;
// $product_type = $data['type'] ?? null;
// $size = $data['size'] ?? null;
// $weight = $data['weight'] ?? null;
// $height = $data['height'] ?? null;
// $width = $data['width'] ?? null;
// $length = $data['length'] ?? null;

// // Validation
// if (empty($sku) || empty($name) || empty($price) || empty($product_type)) {
//     header('Content-Type: application/json');
//     echo json_encode(['success' => false, 'message' => 'Required fields are missing']);
//     exit();
// }

// // Prepare specific data based on product type
// $specificData = [];
// switch (strtolower($product_type)) {
//     case 'dvd':
//         $specificData['size'] = $size;
//         break;
//     case 'book':
//         $specificData['weight'] = $weight;
//         break;
//     case 'furniture':
//         $specificData['height'] = $height;
//         $specificData['width'] = $width;
//         $specificData['length'] = $length;
//         break;
//     default:
//         header('Content-Type: application/json');
//         echo json_encode(['success' => false, 'message' => 'Invalid product type']);
//         exit();
// }

// try {
//     // Create the product instance using the factory
//     $product = ProductFactory::create($db, $product_type, $sku, $name, $price, $specificData);

//     // Save the product
//     if ($product->save()) {
//         header('Content-Type: application/json');
//         echo json_encode(['success' => true, 'message' => 'Product added successfully']);
//     } else {
//         header('Content-Type: application/json');
//         echo json_encode(['success' => false, 'message' => 'Failed to save product data']);
//     }
// } catch (Exception $e) {
//     header('Content-Type: application/json');
//     echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
// }

// Close database connection
$database = null;
