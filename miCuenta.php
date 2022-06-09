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


    <div class="formulario">
            <h2>Mi Cuenta</h2>

            <form id="cerrar" action="database/salir.php">

                <input type="submit" id="btn-login" name="btn-login" value="Cerrar sesion"/>


            </form>
        </div>




    <?php include('footer.php')?>
</body>
</html>