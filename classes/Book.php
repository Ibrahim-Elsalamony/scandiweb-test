<?php
require_once 'Product.php';

class Book extends Product
{
    private $weight;

    public function __construct($db, $name = null, $price = null, $weight = null, $id = null)
    {
        parent::__construct($db, $name, $price, $id);
        $this->weight = $weight;
    }

    // Override the save method to save clothing data
    public function save()
    {
        if ($this->id) {
            $query = "UPDATE products SET name = :name, price = :price, weight = :weight WHERE id = :id";
        } else {
            $query = "INSERT INTO products (name, price, weight) VALUES (:name, :price, :weight)";
        }

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':size', $this->weight);

        if ($this->id) {
            $stmt->bindParam(':id', $this->id);
        }

        $stmt->execute();
    }

    public function display()
    {
        parent::display();
        echo ", Weight: " . $this->weight;
    }

    // Getter and setter for size
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}
