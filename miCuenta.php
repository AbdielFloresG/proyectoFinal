<?php
    require 'database/session.php';
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
        <h2>Mi Cuenta</h2>
        <p>
            <?php
                echo $_SESSION['nombre']." ".$_SESSION['apellido'];
            ?>
        </p>
        <p>
            <?php
                echo $_SESSION['email'];
            ?>
        </p>
        <a href="database/salir.php" class="nav-menu-link nav-link">Cerrar sesión</a>
    </div>




    <?php include('footer.php')?>
</body>
</html>