<?php
    require 'database/session.php';
    require 'config/config.php';
    require 'database/conexionSQLI.php';
    require 'database/conexion.php';


    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    $idUsuario = $_SESSION["idUsuario"];

    $query = "SELECT * FROM venta WHERE idUsuario=$idUsuario;";
    $sql = $conn->prepare($query);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <?php include('navbar.php')?>


    <div class="misCompras">


        
        <h1>Mis compras</h1>

        <div class="">
            <table style="color: #EABE3F;" id="tablaVentas" class="table table-responsive table-dark  table-hover table-bordered fs-6" >
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Articulos</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Monto</th>
                    </tr>
                </tfoot> -->
                <tbody >
                    <?php foreach($resultado as $row) {?> 
                        <?php 
                            $descripcion="";
                            $id = $row['idVenta'];
                            $nombreJuego = $row['idUsuario'];
                            $correoUsuario = $row['correoUsuario'];
                            $precioJuego = $row['fechaVenta'];
                            $desarrollador = $row['monto'];
                            
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

    <br><br><br><br><br><br><br><br><br><br><br><br><br>


    <?php include('footer.php')?>
</body>
</html>