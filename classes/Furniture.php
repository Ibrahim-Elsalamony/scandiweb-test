<?php
require_once 'Product.php';

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($db, $product_type, $sku, $name = null, $price = null, $height = null, $width = null, $length = null, $id = null)
    {
        parent::__construct($db, $product_type, $sku, $name, $price, $id);
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
    protected function saveSpecific()
    {
        $query = "INSERT INTO furniture (id, height, width, length) VALUES (:id, :height, :width, :length)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':height', $this->height);
        $stmt->bindParam(':width', $this->width);
        $stmt->bindParam(':length', $this->length);

        return $stmt->execute();
    }
    // the save method to save DVD data
    public function save()
    {
        if (parent::save()) {
            return $this->saveSpecific();
        }
        return false;
    }


    // Override the delete method to delete Furniture data
    public function delete()
    {
        return $this->deleteFromDatabase('furniture') && $this->deleteFromDatabase('products');
    }


    // Getter and setter for height
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->width = $height;
    }

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
