<?php
    require 'database/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Crear cuenta</title>
    
</head>
<body>
    
    <?php
        include("navbar.php");
    ?>


    <div class="formulario">
        <h2>Crear cuenta</h2>

        <form id="formSignUp"action="database/validacionSignUp.php" method="POST">

            <label for="name">Nombre:</label>
            <input type="text" name="name" required="true" placeholder="Ingresa tu nombre" />
            <label for="lastname">Apellidos:</label>
            <input type="text" name="lastname" required="true" placeholder="Ingresa tu apellido" />
            <label for="email">Correo Electronico</label>
            <input type="text" name="email" required="true" placeholder="Ingresa tu Email" />
            <label for="password">Contraseña</label>
            <input type="password" name="password" required="true" placeholder="Ingresa tu Contraseña"/> 
            <label for="confirm_password">Confirma tu contraseña</label>
            <input type="password" name="confirm_password" required="true" placeholder="Confirma tu Contraseña"/> 
            
            <input type="button" id="btn-crear" name="btn-crear" value="Crear cuenta" />
            <div class="linkRegistro">
                <h3>
                    ¿Ya estás registrado? Inicia sesión <span> <a href="login.php">aqui</a> </span> 
                </h3>
            </div>
        </form>
    </div>


    <?php
        include("footer.php")
    ?>
    
    <script src="js/signUp.js"></script>
</body>
</html>