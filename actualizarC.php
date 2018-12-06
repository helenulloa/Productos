<?php

require_once './ModelProducto.php';
session_start(); //iniciar sesion

$modelProducto= new ModelProducto();//invocacion al modelo

        $codigo = $_REQUEST['codigo'];
        if($codigo!=null){
        $prod = $modelProducto->getProducto($codigo);
        $_SESSION['producto'] = serialize($prod);
        header('Location: ./actualizarProducto.php');
        }
