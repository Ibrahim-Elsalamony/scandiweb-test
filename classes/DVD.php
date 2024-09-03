<?php
require_once 'Product.php';

class DVD extends Product
{
    private $size;

    public function __construct($db, $product_type, $sku, $name = null, $price = null, $size = null, $id = null)
    {
        parent::__construct($db, $product_type, $sku, $name, $price, $id);
        $this->size = $size;
    }


    // Override the save method to save DVD data
    protected function fetchSpecificData($pdo)
    {
        $stmt = $pdo->prepare("SELECT size FROM dvd WHERE id = ?");
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
    protected function saveSpecific()
    {
        $query = "INSERT INTO dvd (id, size) VALUES (:id, :size)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':size', $this->size);

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




    // Override the delete method to delete DVD data
    public function delete()
    {
        return $this->deleteFromDatabase('dvd') && $this->deleteFromDatabase('products');
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
