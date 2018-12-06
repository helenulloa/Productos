<?php

require_once './ModelProducto.php';
session_start(); //iniciar sesion

$modelProducto= new ModelProducto();//invocacion al modelo

       $codigo = $_REQUEST['codigo'];
        $modelProducto->eliminarProductos($codigo);
        $listadoE = $modelProducto->getProductos();
        $_SESSION['listadoE'] = serialize($listadoE);
        header('Location: index.php');
       

