<?php
require_once('./config/database.php');
require_once('./objects/product.php');
class Read
{

    public function read()
    {
        $sql = 'SELECT * FROM products LIMIT 10';

        $st = DBConexion::execute($sql);

        $productList = [];

        while ($row = $st->fetch()) {

            $product = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['created'],
                $row['modified']
            );

            $productList[] = $product;
        }
        echo json_encode($productList);
    }
}
