<?php
require_once('core.php');

class DBConexion
{
    private static $instance;
    private function __construct()
    {
        try {
            self::$instance = new PDO(Config::DNS, Config::USER, Config::PASSWORD);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $Exception) {
            print_r ($Exception->errorInfo);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            new DBConexion();
        }
        return self::$instance;
    }
    public static function close()
    {
        self::$instance = null;
    }

    public static function execute($sql): PDOStatement
    {
        $st = self::$instance->prepare($sql);
        $st->execute();
        return $st;
    }
}
