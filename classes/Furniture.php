<?php
require_once 'Product.php';

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($db, $id = null, $sku, $name = null, $price = null, $height = null, $width = null, $length = null, $product_type = null)
    {
        parent::__construct($db, $id, $sku, $name, $price, $product_type);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }


    // Override the save method to save Furniture data
    protected function fetchSpecificData($pdo)
    {
        $stmt = $pdo->prepare("SELECT height, width, length FROM furniture WHERE id = ?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->height = $row['height'] ?? null;
        $this->width = $row['width'] ?? null;
        $this->length = $row['length'] ?? null;
    }

    public function display()
    {
        parent::display();
        echo "Dimensions (HxWxL): {$this->height} x {$this->width} x {$this->length}<br>";
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'type' => 'furniture',
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
        ];
    }


    // Override the save method to save furniture data
    public function save() {}


    // Override the delete method to delete Furniture data



    // Getter and setter for width
    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    // Getter and setter for length
    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
}
