<?php
    require 'database/session.php';
    require 'config/config.php';


    if($_SESSION['nombre']=="Invitado"){
        header("Location: login.php");
    }
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
    <?php include('database/modals/editarUsuarioModal.php')?>

    <div class="miCuenta">
        <h1>Mi Cuenta</h1>
        <p>
            <?php
                echo $_SESSION['nombre']." ".$_SESSION['apellido'];
            ?>
        </p>
        <p>
            <?php
                // echo $_SESSION['email'];
            ?>
        </p>

        <!-- <button type="button"  id="<?php echo $_SESSION['idUsuario'];?>" class="nav-menu-link nav-link" data-bs-toggle="modal" data-bs-target="#modificarUsuario"  onClick="datos(<?php echo $id ?>,'<?php echo $nombreUsuario ?>','<?php echo $apellidoUsuario ?>','<?php echo $correoUsuario ?>','<?php echo $password ?>','<?php echo $rolUsuario ?>')">
            Editar cuenta
        </button> -->
        <a href="misPedidos.php" class="nav-menu-link nav-link">Mis pedidos</a>
        <a href="database/salir.php" class="nav-menu-link nav-link">Cerrar sesión</a>
    </div>




    <?php include('footer.php')?>
</body>
</html>