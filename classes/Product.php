<?php

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $db;
    protected $product_type;

    public function __construct($db)
    {
        $this->db = $db;
    }


    // Abstract methods
    abstract protected function saveSpecific();
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
            error_log($e->getMessage());

            throw new Exception("Error fetching products");
        }
    }

    // General save method
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

    protected function deleteFromDatabase($tableName)
    {
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Setters and getters for common properties
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setProduct_type($product_type)
    {
        $this->product_type = $product_type;
    }
    public function getProduct_type()
    {
        return $this->product_type;
    }
}
