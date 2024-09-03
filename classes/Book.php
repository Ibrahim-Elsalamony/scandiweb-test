<?php
require_once __DIR__ . '/Product.php';
// require_once 'Product.php';

class Book extends Product
{
    private $weight;

    public function __construct($db, $product_type, $sku, $name = null, $price = null, $weight = null, $id = null)
    {
        parent::__construct($db, $product_type, $sku, $name, $price, $id);
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
    protected function saveSpecific()
    {
        $query = "INSERT INTO book (id, weight) VALUES (:id, :weight)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':weight', $this->weight);

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


    // Override the delete method to delete Book data
    public function delete()
    {
        return $this->deleteFromDatabase('book') && $this->deleteFromDatabase('products');
    }


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
