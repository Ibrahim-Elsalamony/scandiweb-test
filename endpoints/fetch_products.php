<?php
// Include necessary classes
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/DVD.php';
require_once __DIR__ . '/../classes/Furniture.php';
require_once __DIR__ . '/../classes/Book.php';

try {
    // Enable error reporting for debugging
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Create a Database instance and get a connection
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        throw new Exception("Database connection error");
    }

    // Fetch products with their specific data using a single query
    $stmt = $db->prepare("
        SELECT 
            p.id,
            p.sku,
            p.name,
            p.price,
            p.product_type AS type,
            b.weight,
            d.size,
            f.height,
            f.width,
            f.length
        FROM products p
        LEFT JOIN book b ON p.id = b.id
        LEFT JOIN dvd d ON p.id = d.id
        LEFT JOIN furniture f ON p.id = f.id
    ");

    // Execute the query
    $stmt->execute();

    // Fetch all results as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format products based on their type
    $formattedProducts = array_map(function ($product) use ($db) {
        // Ensure to include the type in the object construction
        switch ($product['type']) {
            case 'Book':
                $book = new Book($db, 'book', $product['sku'], $product['name'], $product['price'], $product['weight'], $product['id']);
                return [
                    'id' => $book->getId(),
                    'sku' => $book->getSku(),
                    'name' => $book->getName(),
                    'price' => $book->getPrice(),
                    'weight' => $book->getWeight(),
                    'type' => 'Book'
                ];
            case 'DVD':
                $dvd = new DVD($db, 'dvd', $product['sku'], $product['name'], $product['price'], $product['size'], $product['id']);
                return [
                    'id' => $dvd->getId(),
                    'sku' => $dvd->getSku(),
                    'name' => $dvd->getName(),
                    'price' => $dvd->getPrice(),
                    'size' => $dvd->getSize(),
                    'type' => 'DVD'
                ];
            case 'Furniture':
                $furniture = new Furniture($db, 'furniture', $product['sku'], $product['name'], $product['price'], $product['height'], $product['width'], $product['length'], $product['id']);
                return [
                    'id' => $furniture->getId(),
                    'sku' => $furniture->getSku(),
                    'name' => $furniture->getName(),
                    'price' => $furniture->getPrice(),
                    'height' => $furniture->getHeight(),
                    'width' => $furniture->getWidth(),
                    'length' => $furniture->getLength(),
                    'type' => 'Furniture'
                ];
            default:
                return $product; // In case a new type is added or there is a mismatch
        }
    }, $products);

    // Output formatted products as JSON
    header('Content-Type: application/json');
    echo json_encode($formattedProducts);
} catch (PDOException $e) {
    // Return error in JSON format
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    // Return general error in JSON format
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
