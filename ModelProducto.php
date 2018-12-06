<?php
include_once 'Database.php';
include_once 'Producto.php';

class ModelProducto {
    
    public function getProductos(){
        $pdo = Database::connect();
        $sql = "select * from producto";
        $resultado = $pdo->query($sql);
        $listadoE = array();
        foreach ($resultado as $res){
            $producto = new Producto();
            $producto->setCodigo($res['codigo']);
            $producto->setNombre($res['nombre']);
            $producto->setPrecio($res['precio']);
            $producto->setExistencia($res['existencia']);
            array_push($listadoE, $producto);
        }
        Database::disconnect();
        return $listadoE;
    }
    
    public function crearProductos($codigo, $nombre, $precio, $existencia){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into producto (codigo,nombre,precio,existencia) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);        
        try{
            $consulta->execute(array($codigo, $nombre, $precio, $existencia));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
          Database::disconnect();
    }
    
    //ELIMINAR
    public function eliminarProductos($codigo) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from producto where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        Database::disconnect();
    }
    //ACTUALIZAR
    public function actualizarProductos($codigo, $nombre, $precio, $existencia){
        $pdo = Database::connect();
        $sql = "update producto set nombre=?,precio=?,existencia=? where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($nombre, $precio, $existencia,$codigo));
        Database::disconnect();
    }
    
    public function getProducto($codigo) {
        $pdo = Database::connect();
        $sql = "select * from producto where codigo=?"; 
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $producto = new Producto();
            $producto->setCodigo($res['codigo']);
            $producto->setNombre($res['nombre']);
            $producto->setPrecio($res['precio']);
            $producto->setExistencia($res['existencia']);
       Database::disconnect();
        return $producto;
    }
    
    
        
        
        
    }

    

