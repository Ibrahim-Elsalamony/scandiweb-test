<?php
// Include necessary classes
require_once __DIR__ . '/../classes/Database.php';

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
?>

<!-- header -->
<?php include 'templates/product_list/header.php'; ?>

<!-- content -->
<?php include 'templates/product_list/content.php'; ?>

<!-- footer -->
<?php include 'templates/product_list/footer.php'; ?>


<!-- <script src="/assets/js/vue-app.js"></script> -->