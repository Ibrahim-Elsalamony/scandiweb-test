<?php

class ProductFactory
{
    public static function create($db, $product_type)
    {
        $className = ucfirst($product_type);

        if (class_exists($className)) {
            return new $className($db);
        } else {
            throw new Exception("Invalid product type: $product_type");
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
            $className = ucfirst($productType);

            if (class_exists($className)) {
                $product = new $className($db);
                $product->setId($id);
                return $product;
            } else {
                throw new Exception("Invalid product type for deletion: $productType");
            }
        } else {
            throw new Exception("Product not found.");
        }
    }
}
