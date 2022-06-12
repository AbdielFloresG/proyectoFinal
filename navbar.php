<?php
  
    // require 'database/conexionSQLI.php';


    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    $ruta="";
    $texto="";
    if($_SESSION['privilegio']=='user'){
      $texto = "Mi Cuenta";
      $ruta = "miCuenta.php";
    }else if($_SESSION['privilegio']=='guest'){
      $texto = "Iniciar Sesion";
      $ruta = "login.php";
    }else if($_SESSION['privilegio']=='admin'){
      $texto = "Dashboard";
      $ruta = "dashboard/principal.php";
    }
?>


<script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
<link rel = "stylesheet" href = "css/estilos.css">
<script defer src="js/navbar.js"></script>

<header class="header">
      <nav class="nav">
        <a href="index.php" class="logo nav-link">
            <img src="img/logo.png" alt="">
        GameStore
        </a>
        
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu align-items-center">
          <li class="nav-menu-item">
            <a href="categorias.php" class="nav-menu-link nav-link">Categorias</a>
          </li>
          <li class="nav-menu-item">
            <a href="aboutUs.php" class="nav-menu-link nav-link">Nosotros</a>
          </li>
          <li class="nav-menu-item">
            <a href="contacto.php" class="nav-menu-link nav-link">Contacto</a>
          </li>
          <li class="nav-menu-item">
            <a href=<?php echo $ruta?> class="nav-menu-link nav-link">
              <?php echo $texto;?>
            </a>
          </li>
          <li class="nav-menu-item">
            <a href="checkout.php" class="nav-menu-cart" aria-label="Carrito">
              <i class="fas fa-shopping-cart"></i>
              <span id="num_cart" class="badge bg-danger"><?php echo $num_cart?></span>
            </a>
          </li>
          

        </ul>
      </nav>
    </header>


