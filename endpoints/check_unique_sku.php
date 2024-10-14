<?php
require_once __DIR__ . '/../config/autoload.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die(json_encode(["success" => false, "message" => "Database connection error"]));
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'];

    try {
        $skuValidator = new Validator($db, 'sku', 'products');
        $exists = $skuValidator->checkUniqueSKU($sku);

        echo json_encode(['exists' => $exists]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
