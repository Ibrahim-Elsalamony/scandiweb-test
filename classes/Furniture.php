<?php
require_once 'Product.php';

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($db, $name = null, $price = null, $height = null, $width = null, $length = null, $id = null)
    {
        parent::__construct($db, $name, $price, $id);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    // Override the save method to save clothing data
    public function save()
    {
        if ($this->id) {
            $query = "UPDATE products SET name = :name, price = :price, height = :height, width = :width, length = :length WHERE id = :id";
        } else {
            $query = "INSERT INTO products (name, price, height,width,length) VALUES (:name, :price, :height,:width,:length)";
        }

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':height', $this->height);
        $stmt->bindParam(':width', $this->width);
        $stmt->bindParam(':length', $this->length);

        if ($this->id) {
            $stmt->bindParam(':id', $this->id);
        }

        $stmt->execute();
    }

    public function display()
    {
        // parent::display();
        // echo ", Height: " . $this->height;
    }

    // Getter and setter for size
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
}
