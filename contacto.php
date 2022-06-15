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
<style>
    #divIzquierda{
        float:left;
        width: 45%;
        margin-left:5%;
    }

    #divDerecha{
        float:left;
        width: 50%;
    }
    #aparte{
        overflow:hidden;
    }
    .alinearIzquierda{
        text-align:left;
    }
    #centarCirculos{
        overflow:hidden;
        width: 190px;
        height: 46px;
    }
    .circulo {
     width: 40px;
     height: 40px;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
     background: #EABE3F;
     float:left;
     margin-left:10px;
    }
    #circuloUno{
        margin-left:0px;
    }
    .mensaje{
        height: 20%;
        text-align:left;
        text-align:top;
    }
    #textArea{
        outline: none;
        padding: 10px;
        display: block;
        width: 85%;
        height: 20%;
        max-width: 700px;
        border-radius: 3px;
        border: 1px solid #eee;
        margin: 5px auto 25px;
        border-color:#EABE3F;
    }
    ::placeholder { color: #FFECB4; }

    #estiloBoton{
        padding: 10px;
        background: #EABE3F;
        max-width: 400px;
        width: 65%;
        margin: 30px auto 25px;
        font-size: larger;
        border: 0;
        border-radius: 4px;
        cursor: pointer;
        color: black;
        height: 70px;
    }
    #estiloBoton:hover{
        background: rgba(234, 190, 63,0.6);
    }
</style>



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

<main>
<div id="aparte" class="formulario">
        <div  id="divIzquierda">
            <br><br><br><br>
            <h1 class="alinearIzquierda">Contactanos</h1> 
            <br>
            <p style="color: #FFECB4;" class="alinearIzquierda">Escribe lo que desees comunicarnos,
               veremos como ayudarte. Nos importa mucho tu opinion todo 
               mensaje sera bien recibido y contestado, nos ayuda a mejorar.
            </p>
            <br>
            <center>
                <div id="centarCirculos">
                    <div id="circuloUno" class="circulo"></div>
                    <div class="circulo"></div>
                    <div class="circulo"></div>
                    <div class="circulo"></div>
                </div>
            </center>
        </div>
        <div id="divDerecha">            

            <form action="enviarCorreo.php" method="post">
                    <label>Nombre</label>
                    <input style="background:#171515; color: #FFECB4; border-color:#EABE3F;" type="text" id="email" name="email"  placeholder="Ingresa tu nombre" >
                    <label for="email">Correo Electronico</label>
                    <input style="background:#171515; color: #FFECB4; border-color:#EABE3F;" type="text" id="email" name="nombreUsuario" placeholder="Ingresa tu correo electronico" >
                    <label for="email">Mensaje</label>
                    <textarea style="background:#171515; color: #FFECB4;" name="textoArea" id="textArea" rows="10" cols="50" placeholder="Ingresa tu mensaje"></textarea>   
                    <input type="submit" id="estiloBoton" name="enviar" value="Enviar">
                    
           
            </form>
         </div>
        </div>
</main>


<?php include('footer.php'); ?>




    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>
