<?php
    require 'database/session.php';
    require 'config/config.php';

   
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


    <div class="miCuenta">
        <h2>Venta realizada exitosamente</h2>
        <p>
            <br><br>
        </p>
        <p>
          
        <a href="index.php" class="nav-menu-link nav-link">Seguir Comprando</a>
        </p>

    </div>




    <?php include('footer.php')?>
</body>
</html>