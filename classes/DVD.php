<?php
require_once 'Product.php';

class DVD extends Product
{
    private $size;

    public function __construct($db, $id = null, $sku, $name = null, $price = null, $size = null, $product_type = null)
    {
        parent::__construct($db, $id, $sku, $name, $price, $product_type);
        $this->size = $size;
    }


    // Override the save method to save DVD data
    protected function fetchSpecificData($pdo)
    {
        $stmt = $pdo->prepare("SELECT size FROM dvds WHERE id = ?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->size = $row['size'] ?? null;
    }

    public function display()
    {
        parent::display();
        echo "Size: {$this->size} MB<br>";
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'type' => 'dvd',
            'size' => $this->size,
        ];
    }


    // Override the save method to save DVD data
    public function save() {}


    // Override the delete method to delete DVD data



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
