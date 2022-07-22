<?php

require_once('./config/database.php');
require_once('./objects/product.php');

class Create
{

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

        // en bd
        DBConexion::execute($sql);
        DBConexion::close($sql);
    }
}
