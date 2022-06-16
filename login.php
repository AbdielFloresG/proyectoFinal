<!-- Tienda GameStore 
Esta es la pagina para mostrar los detalles 
de las cuentas de los usuarios
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->

<?php
    // Se agregan archivos necesarios para el funcionamiento de la pagina
    require 'database/session.php';
    require 'config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDNs para el funcionamiento de bootstrap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Iniciar Sesion</title>
    
</head>
<body>
    <!-- Se agrega el navbar a la pagina -->
    <?php
        include("navbar.php");
    ?>
    <?php  include('modales/verificaTusDatos.php'); ?>
    <?php  include('modales/noSePuedeComprar.php'); ?>

        <!-- Container del login -->
        <div class="formulario">
            <h2>Iniciar sesión</h2>
            <!-- Formulario de inicio de sesion -->
            <form id="formLogIn" action="database/validacionLogin.php"  method="POST">
                
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" name="email" required="true" placeholder="Ingresa tu Email" />
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required="true" placeholder="Ingresa tu Contraseña" minlength="6" maxlength="20"/> 
                    <div class="linkLogin">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>    
                    <!-- <button type="submit">Ingresar</button> -->
                    <input type="button" id="btn-login" name="btn-login" value="Iniciar sesión"/>
                    <div class="linkRegistro">
                        <h3>
                            ¿Aun no estás registrado? Haz click <span> <a href="signUp.php">aqui</a> </span> para registrate
                        </h3>
                    </div>
                    <!-- Si hay un error en los datos se regresa una variable por metodo GET 
                    y si el resultado es si, se muestra esta alerta -->
                    <div class="alerta">
                        <?php 
                            error_reporting(E_ALL | E_NOTICE);
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="si"){ ?>
                                    <script type="text/javascript">
                                        var myModal = new bootstrap.Modal(document.getElementById('verificaTusDatos'))
                                        myModal.show()
                                    </script>   
                        <?php  }   }?>

                        <?php 
                            error_reporting(E_ALL | E_NOTICE);
                            if(isset($_GET["error2"])){
                                if($_GET["error2"]=="si"){ ?>
                                    <script type="text/javascript">
                                        var myModal = new bootstrap.Modal(document.getElementById('noSePuedeComprar'))
                                        myModal.show()
                                    </script>   
                        <?php  }   }?>

                    </div>
            </form>
        </div>


    <!-- Se agrega el footer de la pagina -->
    <?php
        include("footer.php")
    ?>
    
<!-- Se incluye el script de las validaciones del login -->
<script src="js/login.js"></script>
</body>
</html>