<?php
require_once 'Product.php';

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    // helpful method to save the product for Furniture table
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

    // save the product for Furniture & Product table
    public function save()
    {
        if (parent::save()) {
            return $this->saveSpecific();
        }
        return false;
    }

    // delete the product from Furniture & Product table
    public function delete()
    {
        return $this->deleteFromDatabase('furniture') && $this->deleteFromDatabase('products');
    }

    // Setters and Getters for the properties
    public function setDimensions($height, $width, $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function getLength()
    {
        return $this->length;
    }
}
