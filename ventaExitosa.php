<!-- Tienda GameStore 
Esta es la pagina de venta exitosa de la pagina
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->


<?php
 //Archivos requeridos para el funcionamiento de la pagina
    require 'database/session.php';
    require 'config/config.php';   
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
    <link rel="icon" href="img/icon.ico">
</head>
<body>
    <?php include('navbar.php')?>

    <!-- Se hace el container de la pagina donde se muestra el mensaje-->
    <div class="miCuenta">
        <h2>Venta realizada exitosamente</h2>
        <p>
            <br><br>
        </p>
        <p>
        <a href="index.php" class="nav-menu-link nav-link">Seguir Comprando</a>
        </p>

    </div>

    <br><br><br><br><br><br>

    <!-- Se incluye el footer de la pagina -->
    <?php include('footer.php')?>
</body>
</html>