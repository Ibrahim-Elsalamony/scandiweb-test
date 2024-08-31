<?php
try {
    // Create a Database instance and get a connection
    $database = new Database();
    $db = $database->getConnection();

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
        LEFT JOIN books b ON p.id = b.id AND p.product_type = 'book'
        LEFT JOIN dvds d ON p.id = d.id AND p.product_type = 'dvd'
        LEFT JOIN furniture f ON p.id = f.id AND p.product_type = 'furniture'
    ");

    // Execute the query
    $stmt->execute();

    // Fetch all results as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format products based on their type
    $formattedProducts = array_map(function ($product) {
        switch ($product['type']) {
            case 'book':
                $book = new Book($product['id'], $product['sku'], $product['name'], $product['price'], $product['weight']);
                return $book->toArray();
            case 'dvd':
                $dvd = new DVD($product['id'], $product['sku'], $product['name'], $product['price'], $product['size']);
                return $dvd->toArray();
            case 'furniture':
                $furniture = new Furniture($product['id'], $product['sku'], $product['name'], $product['price'], $product['height'], $product['width'], $product['length']);
                return $furniture->toArray();
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
}
