<?php
class ProductDto
{


    private $conn;
    public function __construct()
    {
        $this->conn = DBConexion::getInstance();
    }



    public function create(Product $product)
    {
        $sql = "INSERT INTO products
        ( `name`, `description`, `price`, `created`, `modified`)
        VALUES (
        '$product->getName('name')',
        `$product->getDescription('description')',
        '$product->getPrice('price')',
        '$product->getCreated('created')',
        '$product->getModified('modified')') ";

        $st = $this->conn->prepare($sql);
        $st->execute();
    }


    public function read()
    {
        $sql = 'SELECT * FROM products LIMIT 10';
        $st = $this->conn->prepare($sql);
        $st->execute();

        $productList = [];

        while ($row = $st->fetch()) {

            $product = new Product();
            $product->setCategory_id($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setPrice($row['price']);
            $product->setCreated($row['created']);
            $product->setModified($row['modified']);

            $productList[] = $product;
            print_r($product);
        }
        return $productList;
    }


    public function update($id)
    {
        $sql = "DELETE FROM `products` WHERE id=$id";
        $st = $this->conn->prepare($sql);
        $st->execute();
    }



    public function readOne(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $st = $this->conn->prepare($sql);
        $st->execute();

        $row = $st->fetchAll();

        $product = new Product();
        $product->setCategory_id($row['id']);
        $product->setName($row['name']);
        $product->setDescription($row['description']);
        $product->setPrice($row['price']);
        $product->setCreated($row['created']);
        $product->setModified($row['modified']);

        return $product;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id=$id";
        $st = $this->conn->prepare($sql);
        $st->execute();
    }
}
