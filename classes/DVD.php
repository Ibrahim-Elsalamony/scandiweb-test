<?php
require_once 'Product.php';

class DVD extends Product
{
    private $size;

    public function __construct($db, $name = null, $price = null, $size = null, $id = null)
    {
        parent::__construct($db, $name, $price, $id);
        $this->size = $size;
    }

    // Override the save method to save clothing data
    public function save()
    {
        if ($this->id) {
            $query = "UPDATE products SET name = :name, price = :price, size = :size WHERE id = :id";
        } else {
            $query = "INSERT INTO products (name, price, size) VALUES (:name, :price, :size)";
        }

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':size', $this->size);

        if ($this->id) {
            $stmt->bindParam(':id', $this->id);
        }

        $stmt->execute();
    }

    public function display()
    {
        // parent::display();
        // echo ", Size: " . $this->size;
    }

    // Getter and setter for size
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }
}
