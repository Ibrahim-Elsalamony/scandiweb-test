<?php

class ProductFactory
{
    public static function create($db, $product_type, $sku, $name, $price, $specificData = [])
    {
        // Dynamically determine the class name
        $className = ucfirst($product_type);

        if (class_exists($className)) {
            switch ($product_type) {
                case 'DVD':
                    return new DVD($db, $product_type, $sku, $name, $price, $specificData['size']);
                case 'Book':
                    return new Book($db, $product_type, $sku, $name, $price, $specificData['weight']);
                case 'Furniture':
                    return new Furniture($db, $product_type, $sku, $name, $price, $specificData['height'], $specificData['width'], $specificData['length']);
                default:
                    throw new Exception("Class $className does not exist.");
            }
        } else {
            throw new Exception("Invalid product type.");
        }
    }

    public static function makeDelete($db, $id)
    {
        $sql = "SELECT product_type FROM products WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $productType = $result['product_type'];
            switch ($productType) {
                case 'DVD':
                    return new DVD($db, null, null, null, null, null, $id);
                case 'Book':
                    return new Book($db, null, null, null, null, null, $id);
                case 'Furniture':
                    return new Furniture($db, null, null, null, null, null, null, null, $id);
                default:
                    throw new Exception("Invalid product type.");
            }
        } else {
            throw new Exception("Product not found.");
        }
    }
}
