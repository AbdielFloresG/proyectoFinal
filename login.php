<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>



    
    <div class="formulario">
        <h2>Iniciar sesión</h2>

        <form action="login.php" method="post">
            
                <label for="email">Correo Electronico</label>
                <input type="text" name="email" required="true" placeholder="Ingresa tu Email" />
                <label for="password">Contraseña</label>
                <input type="password" name="password" required="true" placeholder="Ingresa tu Contraseña"/>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <input type="submit" name="" value="Iniciar sesión"/>

        </form>
    </div>


    <?php
        include("footer.php")
    ?>
    

</body>
</html>