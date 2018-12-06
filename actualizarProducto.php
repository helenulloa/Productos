<?php
session_start();
include './ModelProducto.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $codig = unserialize($_SESSION['producto']);
        ?>

        <form action="./Controlador.php" >
                <div>Codigo</div>
                <input type="text" name="codigo" 
                       value="<?php echo $codig->getCodigo(); ?>"
                       enabled="true" required/></br>

                <div>Nombre</div>
                <input type="text" name="nombre" 
                         value="<?php echo $codig->getNombre();?>"required/></br>
                <div>Precio</div>
                <input type="text"  name="precio" 
                         value="<?php echo $codig->getPrecio(); ?>"
                       required/></br>
                <div>Existencia</div>
                <input type="text"  name="existencia" 
                         value="<?php echo $codig->getExistencia(); ?>" required/></br>
                <input type="hidden" value="actualizarProducto" name="opcion">
                <button class="btn-link" type="submit" >
                    ACTUALIZAR PRODUCTO
                </button>
            
        </form>


    </body>
</html>