<?php
require_once 'Product.php';

class Book extends Product
{
    private $weight;

    public function __construct($db, $id = null, $sku, $name = null, $price = null, $weight = null, $product_type = null)
    {
        parent::__construct($db, $id, $sku, $name, $price, $product_type);
        $this->weight = $weight;
    }


    // Override the save method to save Book data
    protected function fetchSpecificData($pdo)
    {
        $stmt = $pdo->prepare("SELECT weight FROM books WHERE id = ?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->weight = $row['weight'] ?? null;
    }

    public function display()
    {
        parent::display();
        echo "Weight: {$this->weight}<br>";
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'type' => 'book',
            'weight' => $this->weight,
        ];
    }


    // Override the save method to save Book data
    public function save() {}


    // Override the delete method to delete Book data



    // Getter and setter for weight
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}
