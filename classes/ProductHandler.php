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

        if (empty($sku) || empty($name) || empty($price) || empty($product_type)) {
            throw new Exception("Required fields are missing.");
        }

        $product = ProductFactory::create($this->db, $product_type);

        $product->setSku($sku);
        $product->setName($name);
        $product->setProduct_type($product_type);
        $product->setPrice($price);

        foreach ($_POST as $key => $value) {
            if ($key === 'sku' || $key === 'name' || $key === 'price' || $key === 'product_type') {
                continue;
            }

            $setter = 'set' . ucfirst($key);

            if (method_exists($product, $setter)) {
                $product->$setter($value);
            }
        }

        if ($product->save()) {
            header("Location: /");
            exit();
        } else {
            throw new Exception("Failed to save product data.");
        }
    }
}
