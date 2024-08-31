<?php
abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $db;
    protected $product_type;

    public function __construct($db, $id = null, $sku = null, $name = null, $price = null, $product_type = null)
    {
        $this->db = $db;
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->product_type = $product_type;
    }


    // Abstract method to fetch all products
    abstract protected function fetchSpecificData($pdo);

    // General method to output product details
    public function display()
    {
        echo "ID: {$this->id}<br>";
        echo "SKU: {$this->sku}<br>";
        echo "Name: {$this->name}<br>";
        echo "Price: {$this->price}<br>";
        echo "Type: {$this->product_type}<br>";
    }


    // Abstract method to save the product
    abstract public function save();



    // Abstract method to delete products



    // Getters and setters fot Id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getters and setters fot SKU
    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    // Getters and setters fot Name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Getters and setters fot Price
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Getters and setters fot Product Type
    public function getType()
    {
        return $this->product_type;
    }

    public function setType($product_type)
    {
        $this->product_type = $product_type;
    }
}
