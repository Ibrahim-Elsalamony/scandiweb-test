<?php
require_once __DIR__ . '/Product.php';

class Book extends Product
{
    private $weight;

    public function __construct($db, $product_type, $sku, $name = null, $price = null, $weight = null, $id = null)
    {
        parent::__construct($db, $product_type, $sku, $name, $price, $id);
        $this->weight = $weight;
    }


    // helpful method to save the product for Book table
    protected function saveSpecific()
    {
        $query = "INSERT INTO book (id, weight) VALUES (:id, :weight)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':weight', $this->weight);

        return $stmt->execute();
    }

    // save the product for Book & Product table
    public function save()
    {
        if (parent::save()) {
            return $this->saveSpecific();
        }
        return false;
    }

    // delete the product from Book & Product table
    public function delete()
    {
        return $this->deleteFromDatabase('book') && $this->deleteFromDatabase('products');
    }
}
