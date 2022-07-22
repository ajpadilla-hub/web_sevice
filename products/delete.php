
<?php
require_once('./config/database.php');
require_once('./objects/product.php');
class Upadate
{
    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id=$id";
        DBConexion::execute($sql);
    }
}
