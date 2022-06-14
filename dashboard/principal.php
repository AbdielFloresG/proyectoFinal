
<?php

require '../database/conexionSQLI.php';
require '../database/conexion.php';
require '../database/sessionAdmin.php';

$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];


$queryResultado = "SELECT * FROM Juego;";
$sqlResultado = $conn->prepare($queryResultado);
$sqlResultado->execute();
$resultado = $sqlResultado->fetchAll(PDO::FETCH_ASSOC);


$query3 = "SELECT COUNT(*) FROM Usuario WHERE rolUsuario='user';";
$sql3 = $conn->prepare($query3);
$sql3->execute();
$cantidadUsuarios = $sql3->fetchAll(PDO::FETCH_ASSOC);

$query4 = "SELECT COUNT(*) FROM Usuario WHERE rolUsuario='admin';";
$sql4 = $conn->prepare($query4);
$sql4->execute();
$cantidadAdmin = $sql4->fetchAll(PDO::FETCH_ASSOC);

$query5 = "SELECT DISTINCT idVenta FROM detalleVenta;";
$sql5 = $conn->prepare($query5);
$sql5->execute();
$idVenta = $sql5->fetchAll(PDO::FETCH_ASSOC);


$query2 = "SELECT monto FROM Venta;";
$sql2 = $conn->prepare($query2);
$sql2->execute();
$cantidadVentas = $sql2->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($cantidadVentas as $row) {?>
        <?php 
            $cantidadVendidos []= $row['monto']; 
            rsort($cantidadVendidos);                             
        ?>
<?php }$cantidadVendidosTamaño = count($cantidadVendidos);?>

<?php 
$montoAnterior=0;
      for($i=0; $i<$cantidadVendidosTamaño; $i++){
                $query6 = "SELECT idVenta FROM venta WHERE monto=$cantidadVendidos[$i];";
                $sql6 = $conn->prepare($query6);
                $sql6->execute();
                $cantidadVentasMonto = $sql6->fetchAll(PDO::FETCH_ASSOC);
                if($montoAnterior==$cantidadVendidos[$i]){

                }else{
                  foreach($cantidadVentasMonto as $row) {
                    $cantidadVendidosMonto []= $row['idVenta'];
                    $montoAnterior=$cantidadVendidos[$i];                   
                  };
                }
      }
        
?>

<?php foreach($idVenta as $row) {?>
        <?php 
            $idVentas[]=$row['idVenta']; 
            rsort($idVentas);    
        ?>
<?php } $tamaño=count($idVentas); echo 'tamaño es:'.$tamaño.'aqui: '.$idVentas[0];?>

<?php 
for($i =0; $i<$tamaño; $i++){
    $queryAgrupar = "SELECT count(idVenta) FROM detalleVenta WHERE idVenta=$idVentas[$i];";
    $sqlAgrupar = $conn->prepare($queryAgrupar);
    $sqlAgrupar->execute();
    $agrupar = $sqlAgrupar->fetchAll(PDO::FETCH_ASSOC);
   foreach($agrupar as $row) {
     $acomodados[]=$row['count(idVenta)'];                   
    } 
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GameStore Admin</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="img/logo.png" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="principal.php">GameStore Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $nombre." ".$apellido."  ";?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../database/salir.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Configuracion</div>
                            <a class="nav-link" href="principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">GRAFICAS</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficas
                            </a>
                            <div class="sb-sidenav-menu-heading">Tablas</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Juegos
                            </a>
                            <a class="nav-link" href="tablesUsuario.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuarios
                            </a>
                            <a class="nav-link" href="tablesVentas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ventas
                            </a>
                            <a class="nav-link" href="tablaLog.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Log
                            </a>
                            <a class="nav-link" href="tablaDetalleVenta.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle de ventas
                            </a>
                            <div class="sb-sidenav-menu-heading">Pagina</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-door-closed"></i></div>
                                Pagina principal
                            </a>
                            <a class="nav-link" href="../database/salir.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-door-closed"></i></div>
                                Cerrar sesión
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Admin:</div>
                        <?php echo $nombre." ".$apellido."  ";?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pantalla principal</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Grafica, monto vendido
                                    </div>
                                    <div class="card-body"><canvas id="graficaVentas" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Grafica, cantidad de ventas
                                    </div>
                                    <div class="card-body"><canvas id="graficaJuegosCaros" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tablas
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idJuego</th>
                                            <th>Nombre de Juego</th>
                                            <th>Precio</th>
                                            <th>Desarrollador</th>
                                            <th>Genero</th>
                                            <th>Año de lanzamiento</th>
                                            <th>Descripcion</th>
                                            <th>Activo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>idJuego</th>
                                            <th>Nombre de Juego</th>
                                            <th>Precio</th>
                                            <th>Desarrollador</th>
                                            <th>Genero</th>
                                            <th>Año de lanzamiento</th>
                                            <th>Descripcion</th>
                                            <th>Activo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($resultado as $row) {?>
                                            <?php 
                                                $id = $row['idJuego'];
                                                $nombreJuego = $row['nombreJuego'];
                                                $precioJuego = $row['precio'];
                                                $desarrollador = $row['desarrollador'];
                                                $genero = $row['genero'];
                                                $fechaLanzamiento = $row['fechaLanzamiento'];
                                                $descripcion = $row['descripcion'];
                                                $activo = $row['activo'];


                                            ?>
 
                                            <tr>
                                                <td><?php echo $id;?> </td>
                                                <td><?php echo $nombreJuego;?> </td>
                                                <td><?php echo $precioJuego;?> </td>
                                                <td><?php echo $desarrollador;?> </td>
                                                <td><?php echo $genero;?> </td>
                                                <td><?php echo $fechaLanzamiento;?> </td>
                                                <td><?php echo $descripcion;?> </td>
                                                <td><?php echo ($activo==1)? "Si" : "No" ?> </td>
                                                
                                            </tr>

                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">GameStore &copy; Pagina admin 2022</div>
                            <div>
                                <a>Privacy Policy</a>
                                &middot;
                                <a>Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<script>
        
  var speedCanvas = document.getElementById("graficaVentas");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 11;
  Chart.defaults.global.defaultFontColor= "black";
  
  const labels = [];

  <?php 
  for($i=0; $i<$cantidadVendidosTamaño; $i++){
        echo "labels.push(".$cantidadVendidosMonto[$i].");" ;
  }
      
  ?>

  const datas = [];
  <?php 
  for($i=0; $i<$cantidadVendidosTamaño; $i++){
        echo "datas.push(".$cantidadVendidos[$i].");" ;
  }
  ?>

  var speedData = {
    labels: labels,
    datasets: [{
      label: "Numero de ventas",
      data: datas,
      lineTension: 0.3,
      fill: true,
      borderColor: '#EABE3F',
      backgroundColor: 'rgba(0,0,0,0.8)',
      pointBorderColor: '#FFECB4',
      pointBackgroundColor: '#EABE3F',
      borderWidth: 2,
      pointRadius: 4
    }]
  };



  var lineChart = new Chart(speedCanvas, {
    type: 'bar',
    data: speedData,
    options:{
      legend: {
            //display: true,
            labels: {
             boxWidth: 80,
                 
            }
      },
      scales: {
         
        xAxes: [{
          gridLines:{
            borderDash: [2, 2],
            // Eje x color verde
            color: '#EABE3F',
            display: true
          },
          scaleLabel: {
            display: true,
            labelString: "idVenta",
            fontColor: 'black'
          }
        }],
        yAxes: [{
          gridLines:{
            borderDash: [2, 2], // Eje y color rojo
            color: '#EABE3F',
            display: true,
          },
          scaleLabel: {
            display: true,
            labelString: "Monto",
            fontColor: 'black'
          }
        }]
      }
    }
    
  });
</script>
<script>
        
  var speedCanvas2 = document.getElementById("graficaJuegosCaros");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 11;
  Chart.defaults.global.defaultFontColor= "black";
  
  
  const labels2 = [];

  <?php 
  for($i=0; $i<$tamaño; $i++){
        echo "labels2.push(".$idVentas[$i].");" ;
  }
      
  ?>

  const datas2 = [];
  <?php 
  for($i=0; $i<$tamaño; $i++){
        echo "datas2.push(".$acomodados[$i].");" ;
  }
      
  ?>
  var speedData2 = {
    labels: labels2,
    datasets: [{
      label: "Cantidad de ventas",
      data: datas2,
      fill: true,
      borderColor: '#EABE3F',
      backgroundColor: 'rgba(0,0,0,0.9)',
      borderWidth: 2,
    }]
  };



  var lineChart2 = new Chart(speedCanvas2, {
    type: 'line',
    data: speedData2,
    options:{
      legend: {
            //display: true,
            labels: {
             boxWidth: 80
                 
            }
      },
      scales: {
        
        xAxes: [{
          gridLines:{
            borderDash: [2, 2],
            // Eje x color verde
            color: '#EABE3F',
            display: true
          },
          scaleLabel: {
            display: true,
            labelString: "idVenta",
            fontColor: 'black'
          }
        }],
        yAxes: [{
          gridLines:{
            borderDash: [2, 2], // Eje y color rojo
            color: '#EABE3F',
            display: true,
          },
          scaleLabel: {
            display: true,
            labelString: "Cantidad vendida",
            fontColor: 'black'
          }
        }]
      }
    }
    
  });
</script>
