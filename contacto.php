<!-- Tienda GameStore 
Esta es la pagina para enviar un 
formulario de contacto
codigo realizado por Ivan Martin Aviles
el 10/06/22 -->

<?php
    require 'config/config.php';
    require 'database/conexion.php';
    require 'database/session.php';

    //Se crea el query
    $query = "SELECT idJuego, nombreJuego, precio FROM Juego WHERE activo=1;";
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
    <title>GameStore</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->

    <!-- custom css -->
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>

<?php  include('navbar.php'); ?>
<?php  include('modales/correoEnviado.php'); ?>
<?php  include('modales/correoNoEnviado.php'); ?>

<main>
    <h1 class="titulos">Contáctanos</h1>

    <div class="contact-wrapper">
        <div class="contact-info">
                <h2>Contactanos</h2>
                <p>Escribe lo que desees comunicarnos, veremos como ayudarte. Nos importa mucho tu opinion todo mensaje sera bien recibido y contestado, nos ayuda a mejorar.</p>
            </div>
            <div class="contact-form">

                <form  id="formContacto" action="correo.php" method="post">
                    <p>
                        <label>Nombre completo</label>
                        <input type="text" name="nombreContacto" id="nombreContacto"  placeholder="Ingresa tu nombre" required="true">
                    </p>
                    <p>
                        <label>Correo electrónico</label>
                        <input type="email" name="emailContacto"  id="emailContacto" placeholder="Ingresa tu correo electrónico" required="true">
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" name="asuntoContacto" id="asuntoContacto" placeholder="Ingresa el asunto" required="true">
                    </p>
                    <p class="block">
                    <label>Mensaje</label> 
                        <textarea name="mensajeContacto" id="mensajeContacto" rows="3" placeholder="Ingresa el mensaje" required="true"></textarea>
                    </p>
                    <p class="block">
                        <button id="btn-contacto"> Enviar </button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php include('correo.php');?>

</main>

<?php 
    error_reporting(E_ALL | E_NOTICE);
    if(isset($_GET["success"])){
        if($_GET["success"]=="si"){ ?>
            <script type="text/javascript">
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
                myModal.show()
            </script>   
<?php  }   }?>

<?php 
    error_reporting(E_ALL | E_NOTICE);
    if(isset($_GET["empty"])){
        if($_GET["empty"]=="si"){ ?>
            <script type="text/javascript">
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'))
                myModal.show()
            </script>   
<?php  }   }?>

          
            

<script>


</script>


<?php include('footer.php'); ?>




    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
    <script src="js/mail.js"></script>
</body>
</html>
