<!-- Tienda GameStore 
Esta es la pagina para mostrar los pedidos realizados
por el usuario
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->


<?php

    // Se solicitan los archivos necesarios para el funcionamiento de la pagina
    require 'database/session.php';
    require 'config/config.php';
    require 'database/conexionSQLI.php';
    require 'database/conexion.php';

    //Se almacenan en variable atributos de la variable sesion
    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    $idUsuario = $_SESSION["idUsuario"];

    //Se hace una consulta para obtener las compras del usuario con su id de usuario
    $query = "SELECT * FROM venta WHERE idUsuario=$idUsuario;";
    $sql = $conn->prepare($query);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Se incluye el navbar en la pagina -->
    <?php include('navbar.php')?>


    <!-- Se le asigna la clase mis compras al contenedor del apartado de las compras -->
    <div class="misCompras">
        <h1>Mis compras</h1>
        <div class="">
            <!-- Se crea la tabla y se le asigna la clase para cambiar el estilo -->
            <table style="color: #EABE3F;" id="tablaVentas" class="table table-responsive table-dark  table-hover table-bordered fs-6" >
                <!-- se asignan las cabeceras de la tabla -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Articulos</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Se hace el foreach para obtener todos los resultados obtenidos por la consulta -->
                    <?php foreach($resultado as $row) {?> 
                        <?php 
                            $descripcion="";
                            $id = $row['idVenta'];
                            $nombreJuego = $row['idUsuario'];
                            $correoUsuario = $row['correoUsuario'];
                            $precioJuego = $row['fechaVenta'];
                            $desarrollador = $row['monto'];
                            
                            //Se hace una segunda consulta a la tabla detalle venta para obtener todos lo productos de la compra
                            $query2 = "SELECT * FROM detalleVenta WHERE idVenta=$id";
                            $sql2 = $conn->prepare($query2);
                            $sql2->execute();
                            $resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                            foreach($resultado2 as $row2){
                                $descripcion=$descripcion." ".$row2['nombreJuego']."   -   ".$row2['cantidad']."  ||  ";
                            }
                        ?>
                        <tr>
                            <td><?php echo $precioJuego;?> </td>
                            <td><?php echo $descripcion?> </td>
                            <td><?php echo $desarrollador;?> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- Se asignan espacios en blanco para bajar el footer -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Se incluye el archivo del footer de la pagina -->
    <?php include('footer.php')?>
</body>
</html>