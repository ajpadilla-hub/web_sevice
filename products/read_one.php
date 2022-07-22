<?php
require_once('./config/database.php');
require_once('./objects/product.php');
class ReadOne
{
    public function readOne(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $st = DBConexion::execute($sql);
        $row = $st->fetchAll();
        $product = new Product(
            $row['id'],
            $row['name'],
            $row['description'],
            $row['price'],
            $row['created'],
            $row['modified']
        );
        echo json_encode($product);
    }
}
