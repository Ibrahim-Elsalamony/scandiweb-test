<?php
abstract class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $db;

    public function __construct($db, $name = null, $price = null, $id = null)
    {
        $this->db = $db;
        $this->name = $name;
        $this->price = $price;
        $this->id = $id;
    }

    // Abstract method to save the product
    abstract public function save();

    // Method to load data from the database
    public function load($id)
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setPrice($row['price']);
    }

    // Common method to display product details
    public function display()
    {
        echo "Product: " . $this->name . ", Price: $" . $this->price;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
