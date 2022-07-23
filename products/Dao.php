<?php
require_once('./config/database.php');
require_once('./objects/product.php');
class ProductDao
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=utf-8');
        DBConexion::getInstance();
    }
    public function read()
    {
        header('Content-Type: application/json; charset=utf-8');
        $sql = 'SELECT * FROM products LIMIT 10';

        $st = DBConexion::execute($sql);
        $productList = [];

        while ($row = $st->fetch()) {

            $product = new Product(
                $row['category_id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['created'],
                $row['modified'],
                $row['id']

            );
            $productList[] = $product;
        }
        echo json_encode($productList);
    }

    public function readOne(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $st = DBConexion::execute($sql);
        $row = $st->fetch();
        $product = new Product(
            $row['category_id'],
            $row['name'],
            $row['description'],
            $row['price'],
            $row['created'],
            $row['modified'],
            $row['id']
        );
        echo json_encode($product);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id=$id";
        DBConexion::execute($sql);
    }

    public function create(Product $product)
    {

        $sql = "INSERT INTO products
        ( `name`, `description`, `price`, `category_id`, `created`)
        VALUES (
        '" . $product->getName() . "',
        '" . $product->getDescription() . "',
        '" . $product->getPrice() . "',
        '" . $product->getCategory_id() . "',
        '" . $product->getCreated() . "'
        ) ";

        DBConexion::execute($sql);
    }

    public function update(Product $product)
    {
        $sql = " UPDATE `products` SET       
        `name`= '" . $product->getName() . "',
        `description`= '" . $product->getDescription() . "',
        `price`= '" . $product->getPrice() . "',
        `category_id` = '" . $product->getCategory_id() . "',
        `created`= '" . $product->getCreated() . "' 
        WHERE id='" . $product->getId() . "'";

        DBConexion::execute($sql);
    }
}
