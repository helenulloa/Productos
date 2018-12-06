<?php

require_once './ModelProducto.php';
session_start(); //iniciar sesion

$modelProducto= new ModelProducto();//invocacion al modelo
$opcion = $_REQUEST['opcion'];

switch ($opcion) { 
    case "listarProductos":
        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: ./index.php');
        break;
    
    case "crearProducto":
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $existencia = $_REQUEST['existencia'];
        try {
        $modelProducto->crearProductos($codigo, $nombre, $precio, $existencia);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }

        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);

        header('Location: ./index.php');
        break;
    
    case "guardarProducto":
        $codigo = $_REQUEST['codigo'];
        $nombres = $_REQUEST['nombres'];
        $precio = $_REQUEST['precio'];
        $existencia = $_REQUEST['existencia'];

        try {
            $modelProducto->crearProductos($codigo,$nombre, $precio, $existencia);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: index.php');
        break;
    
     case "editarProducto":
        $codigo = $_REQUEST['codigo'];
        $listadoE = $modelProducto->getProducto($codigo);
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: index.php');
        break;

    case 'cargarProducto':
        $codigo = $_REQUEST['codigo'];
        if($codigo!=null){
        $prod = $modelProducto->getProducto($codigo);
        $_SESSION['producto'] = serialize($prod);
        header('Location: ./actualizarProducto.php');
        }
        break;
    case "actualizarProducto":
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $existencia = $_REQUEST['existencia'];
        $modelProducto->actualizarProductos($codigo,$nombre, $precio, $existencia);
        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: ./index.php');
        break;
    
    case "eliminarProducto":
       $codigo = $_REQUEST['codigo'];
        $modelProducto->eliminarProductos($codigo);
        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: index.php');
        break;
}
