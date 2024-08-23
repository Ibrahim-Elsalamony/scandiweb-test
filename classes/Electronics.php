<?php
require_once 'Product.php';

class Electronics extends Product
{
    private $warranty;

    public function __construct($db, $name = null, $price = null, $warranty = null, $id = null)
    {
        parent::__construct($db, $name, $price, $id);
        $this->warranty = $warranty;
    }

    // Override the save method to save electronics data
    public function save()
    {
        if ($this->id) {
            $query = "UPDATE products SET name = :name, price = :price, warranty = :warranty WHERE id = :id";
        } else {
            $query = "INSERT INTO products (name, price, warranty) VALUES (:name, :price, :warranty)";
        }

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':warranty', $this->warranty);

        if ($this->id) {
            $stmt->bindParam(':id', $this->id);
        }

        $stmt->execute();
    }

    public function display()
    {
        parent::display();
        echo ", Warranty: " . $this->warranty . " years";
    }

    // Getter and setter for warranty
    public function getWarranty()
    {
        return $this->warranty;
    }

    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
    }
}
