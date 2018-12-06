<!DOCTYPE html>
<?php
session_start();
//require_once './Producto.php';
include './ModelProducto.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
            <div class="row">
                <h3><marquee>PRODUCTOS</marquee></h3>
            </div>

            <p>
            <form action="./Controlador.php">
                <input type="hidden" name="opcion" value="crearProducto">
                <input type="button" value="Nuevo producto" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                <div align="center" id="capa" style="display: none;padding: 10px; background-color: #FFE4C4">
                    <table>
                        <tr>
                            <td>Código:</td><td><input type="text" name="codigo" maxlength="10" required="true" ></td>
                            <td>Nombre:</td><td><input type="text" name="nombre" maxlength="80" required="true" ></td>
                            <td>Precio:</td><td><input type="text" name="precio" maxlength="80" required="true" ></td>
                            <td>Existencia:</td><td><input type="text" name="existencia" maxlength="80" ></td>
                        </tr>                                                                  
                        <tr>
                            <td colspan="3" align="center"><input type="submit" value="Registrar producto" class="btn btn-info" ></td>                            
                        </tr>
                    </table>
                </div>
            </form>
        </p>
        <p></p>
            <form action="./Controlador.php">
                <input type="hidden" value="listarProductos" name="opcion">
                <button  class="btn-info" type="submit" >VER PRODUCTOS </button>
            </form>
        
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>EXISTENCIA</th>        
                    <th colspan="2">OPCIONES</th>    
                </tr>
            </thead>
            <tbody>
                <?php
                
                if (isset($_SESSION['listadoE'])) {
                    $producto = unserialize($_SESSION['listadoE']);
                    foreach ($producto as $pro) {
                        echo "<tr>";
                        echo "<td>" . $pro->getCodigo() . "</td>";
                        echo "<td>" . $pro->getNombre() . "</td>";
                        echo "<td>" . $pro->getPrecio() . "</td>";
                        echo "<td>" . $pro->getExistencia() . "</td>";
                        echo "<td>
                                <form action=\"eliminarC.php\" name=\"form\">
                                <input type=\"hidden\" value=\"".$pro->getCodigo()."\" name=\"codigo\">
                                <button type=\"submit\">
                                ELIMINAR
                                </button> </form></td>";

                        echo "<td>
                                <form action=\"actualizarC.php\" name=\"form\">
                                <input type=\"hidden\" value=\"".$pro->getCodigo()."\" name=\"codigo\">
                                <button type=\"submit\">
                                ACTUALIZAR
                                </button> </form></td>";
                                echo "</tr>";
                        
//                        "<a href='Controlador.php?opcion=eliminarProducto&codigo=" . $pro->getCodigo() . "'><span class='glyphicon glyphicon-remove'> eliminar </span></a></td>";
//                        echo "<td><a href='Controlador.php?opcion=cargarProducto&codigo=" . $pro->getCodigo() . "'><span class='glyphicon glyphicon-pencil'> actualizar </span></a></td>";
//                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>
<?php
//}
?>