<?php

class Product
{
    public string $name;
    public string $description;
    public float  $price;
    public int $category_id;
    public int $id;
    public string $created;
    public string $modified;

    public function __construct($category_id, $name, $setDesc, $price,
     $created, $modified, $id = 0)
    {
        $this->setCategory_id($category_id);
        $this->setName($name);
        $this->setDescription($setDesc);
        $this->setPrice($price);
        $this->setCreated($created);
        $this->setModified($modified);
        $this->setId($id);
    }

    function getName()
    {
        return $this->name;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setDescription(string $description)
    {
        $this->description = $description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice(float $price)
    {
        return $this->price = $price;
    }

    function getCategory_id()
    {
        return $this->category_id;
    }

    function setCategory_id(int $category_id)
    {
        $this->category_id = $category_id;
    }

    function getCreated()
    {
        return $this->created;
    }


    function setCreated($created)
    {
        $this->created = date('Y-m-d H:i:s');
    }

    function getModified()
    {
        return $this->modified;
    }

    function setModified(string $modified)
    {
        $this->modified = $modified;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
