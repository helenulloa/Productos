<?php

class DataBase {

    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'productosCloud';
    private static $dbHost = 'localhost';
    private static $port = '5432';
    private static $dbUsername = 'postgres';
    private static $dbUserPassword = '1996';  
    private static $conexion = null;

    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }
    public static function connect() {
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";"."port=".self::$port .";". "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }
    public static function disconnect() {
        self::$conexion = null;
    }
}

?>