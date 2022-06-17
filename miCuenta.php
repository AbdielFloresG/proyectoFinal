<!-- Tienda GameStore 
Esta es la pagina para mostrar los detalles 
de las cuentas de los usuarios
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->


<!-- Se solicitan los archivos necesarios para el funcionamiento -->
<?php
    require 'database/session.php';
    require 'config/config.php';


    // Aqui se valida que haya una sesion iniciada que no sea de tipo 
    // invitado y si es el caso, se redirecciona al inicio de sesion
    if($_SESSION['nombre']=="Invitado"){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <!-- se incluyen los cdn de bootstrap -->
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon.ico">
</head>
<body>

    <!-- Se incluye el navbar de la pagina -->
    <?php include('navbar.php')?>

    <div class="miCuenta">
        <h1>Mi Cuenta</h1>
        <p>
            <!-- Se muestra el nombre y apellido del usuario -->
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
        <!-- Botones para las acciones del usuario -->
        <a href="misPedidos.php" class="nav-menu-link nav-link">Mis pedidos</a>
        <a href="database/salir.php" class="nav-menu-link nav-link">Cerrar sesión</a>
    </div>



    <!-- Se incluye el footer de la pagina -->
    <?php include('footer.php')?>
</body>
</html>