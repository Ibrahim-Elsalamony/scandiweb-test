<?php

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $db;
    protected $product_type;

    public function __construct($db, $product_type, $sku = null, $name = null, $price = null, $id = null)
    {
        $this->db = $db;
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->product_type = $product_type;
    }


    // Abstract method to save Product    
    abstract protected function saveSpecific();
    // Abstract method to delete products
    abstract public function delete();


    // Show all products in the main page
    public static function getAllProducts(Database $db)
    {
        if (!$db) {
            throw new Exception("Database connection error");
        }

        try {
            $stmt = $db->getConnection()->prepare("
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
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the actual error for debugging (if needed)
            error_log($e->getMessage());

            // Throw a general error message
            throw new Exception("Error fetching products");
        }
    }

    // save Product
    public function save()
    {
        $query = "INSERT INTO products (sku, name, price, product_type) VALUES (:sku, :name, :price, :product_type)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':product_type', $this->product_type);

        if ($stmt->execute()) {
            $this->id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    // delete Product
    protected function deleteFromDatabase($tableName)
    {
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
