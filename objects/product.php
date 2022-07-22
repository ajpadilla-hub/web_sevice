<?php

class Product
{
    private string $name;
    private string $description;
    private float  $price;
    private int $category_id;
    private DateTime $created;
    private string $modified;

    public function __construct($id, $name, $setDesc, $price, $created, $modified)
    {

        $this->setCategory_id($id);
        $this->setName($name);
        $this->setDescription($setDesc);
        $this->setPrice($price);
        $this->setCreated($created);
        $this->setModified($modified);

    }

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    function setDescription(string $description)
    {
        $this->description = $description;
        return  $this->description;
    }

    function getPrice(): float
    {
        return $this->price;
    }

    function setPrice(float $price)
    {

        return $this->price = $price;
    }

    function getCategory_id(): int
    {
        return $this->category_id;
    }

    function setCategory_id(int $category_id)
    {

        return $this->category_id = $category_id;
    }

    function getCreated(): DateTime
    {
        return $this->created;
    }


    function setCreated($created)
    {

        return $this->created = new DateTime($created);
    }


    function getModified(): string
    {
        return $this->modified;
    }

    function setModified(string $modified)
    {

        return $this->modified = $modified;
    }
}
