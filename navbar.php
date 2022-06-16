<!-- Tienda GameStore 
Este codigo realiza el NAVBAR de la paagina y se
invoca en todas las paginas de la pagina y se utiliza
el framework bootstrap 5
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->
<?php
  
  // require 'database/conexionSQLI.php';

  //Se almacena el nombre y apellido de la variable session
  $nombre = $_SESSION["nombre"];
  $apellido = $_SESSION["apellido"];
  $ruta="";
  $texto="";
 

  //Dependiendo de el privilegio de la sesion se cambia dinamicamente el contenido del navbar
  if($_SESSION['privilegio']=='user'){
    $texto = "Mi Cuenta";
    $ruta = "miCuenta.php";
  }else if($_SESSION['privilegio']=='guest'){
    $texto = "Iniciar sesión";
    $ruta = "login.php";
  }else if($_SESSION['privilegio']=='admin'){
    $texto = "Dashboard";
    $ruta = "dashboard/principal.php";
  }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
<link rel = "stylesheet" href = "css/estilos.css">


<!-- Inicio del navbar -->
<header class="header">
      <!-- Se asignan las clases de bootstrap para darle estilo al navbar -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-black px-1">
        <div class="container-fluid">
          <a href="index.php" class="logo nav-link text-white logo">
              <img src="img/logo.png" style="max-width:40px;" alt="">
          GameStore
          </a>
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarCollapse">
              <div class="navbar-nav  ms-auto text-danger">
                <a href="juegos.php" class="nav-item nav-link" style="color:#EABE3F;">Todos los juegos</a>
                <a href="contacto.php" class="nav-item nav-link" style="color:#EABE3F;">Contacto</a>

                <a href=<?php echo $ruta?> class="nav-menu-link nav-link" style="color:#EABE3F;">
                  <?php echo $texto;?>
                </a>
                
                <a href="checkout.php" class="nav-menu-link nav-link" aria-label="Carrito">
                  <i class="fas fa-shopping-cart" style="color:#EABE3F;"></i>
                  <span id="num_cart" class="badge bg-danger"><?php echo $num_cart?></span>
                </a>
              </div>
          </div>
        </div>
      </nav>
</header>
