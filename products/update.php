<?php
require_once('./config/database.php');
require_once('./objects/product.php');
class Upadate
{
    public function update(Product $product)
    {
        $sql = "
        UPDATE `products`        
        `name`='$product->getName('name')',
        `description`='$product->getDescription('description')',
        `price`='$product->getPrice('price')',
        `created`='$product->getCreated('created')',
        `modified`='$product->getModified('modified')' WHERE 1";
        
        DBConexion::execute($sql);
    }
}
