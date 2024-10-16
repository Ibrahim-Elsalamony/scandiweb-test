<?php
require_once 'Product.php';

class DVD extends Product
{
    private $size;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    // helpful method to save the product for DVD table
    protected function saveSpecific()
    {
        $query = "INSERT INTO dvd (id, size) VALUES (:id, :size)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':size', $this->size);

        return $stmt->execute();
    }

    // save the product for DVD & Product table
    public function save()
    {
        if (parent::save()) {
            return $this->saveSpecific();
        }
        return false;
    }

    // delete the product from DVD & Product table
    public function delete()
    {
        return $this->deleteFromDatabase('dvd') && $this->deleteFromDatabase('products');
    }

    // Setters and Getters for the properties
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function getSize()
    {
        return $this->size;
    }
}
