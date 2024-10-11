<?php
class ProductHandler
{
    private $database;
    private $db;

    public function __construct()
    {
        $this->database = new Database();
        $this->db = $this->database->getConnection();

        if (!$this->db) {
            throw new Exception("Database connection error");
        }
    }

    public function handleRequest()
    {
        $sku = $_POST['sku'] ?? null;
        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $product_type = $_POST['product_type'] ?? null;
        $size = $_POST['size'] ?? null;
        $weight = $_POST['weight'] ?? null;
        $height = $_POST['height'] ?? null;
        $width = $_POST['width'] ?? null;
        $length = $_POST['length'] ?? null;

        if (empty($sku) || empty($name) || empty($price) || empty($product_type)) {
            throw new Exception("Required fields are missing.");
        }

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
                throw new Exception("Invalid product type.");
        }

        $product = ProductFactory::create($this->db, $product_type, $sku, $name, $price, $specificData);

        if ($product->save()) {
            header("Location: /");
            exit();
        } else {
            throw new Exception("Failed to save product data.");
        }
    }
}
