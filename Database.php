<?php

class DataBase {

    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'd1hlg5jqlng4nm';
    private static $dbHost = 'ec2-54-197-249-140.compute-1.amazonaws.com';
    private static $port = '5432';
    private static $dbUsername = 'dniomagyuoebvr';
    private static $dbUserPassword = '9db80a284730228d50aa380b36336801efbd580916ddd494c511b27cdd497658';  
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