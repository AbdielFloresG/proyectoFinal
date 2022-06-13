<?php

    require '../database/conexionSQLI.php';
    require '../database/conexion.php';
    require '../database/sessionAdmin.php';

    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];

    $query = "SELECT * FROM venta;";
    $sql = $conn->prepare($query);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

   

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tablas Admin</title><link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                    <!--        Modales         -->
                    <?php include('../database/modals/agregarJuegoModal.php')?>
                    <?php include('../database/modals/editarJuegoModal.php')?>
                    <?php include('../database/modals/eliminarJuegoModal.php')?>

                    
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tablas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Seccion de tablas de la pagina
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ventas
                            </div>
                           
                            <div class="card-body">
                                <table id="tablaVentas">
                               
                                    <thead>
                                        <tr>
                                            <th>ID Venta</th>
                                            <th>ID Usuario</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Monto</th>
                                   

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Venta</th>
                                            <th>ID Usuario</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Monto</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach($resultado as $row) {?>
                                            
                                            <?php 
                                                $descripcion="";
                                                $id = $row['idVenta'];
                                                $nombreJuego = $row['idUsuario'];
                                                $precioJuego = $row['fechaVenta'];
                                                $desarrollador = $row['monto'];
                                                
                                                $query2 = "SELECT * FROM detalleVenta WHERE idVenta=$id";
                                                $sql2 = $conn->prepare($query2);
                                                $sql2->execute();
                                                $resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($resultado2 as $row2){
                                                    $descripcion=$descripcion." ".$row2['nombreJuego']."   -   ".$row2['cantidad']."  ||  ";
                                                }


                                            ?>
 
                                            <tr>
                                                <td><?php echo $id;?> </td>
                                                <td><?php echo $nombreJuego;?> </td>
                                                <td><?php echo $precioJuego;?> </td>
                                                <td><?php echo $descripcion?> </td>
                                                <td><?php echo $desarrollador;?> </td>

                                                <!-- <td> 
                                                    <button type="button"   id="<?php echo $id;?>" class="btn btn-info col-12  my-1" data-bs-toggle="modal" data-bs-target="#modificarJuego"  onClick="datos(<?php echo $id ?>,'<?php echo $nombreJuego ?>','<?php echo $precioJuego ?>','<?php echo $desarrollador ?>','<?php echo $genero ?>','<?php echo $fechaLanzamiento ?>','<?php echo $descripcion ?>','<?php echo $activo ?>')">
                                                        Modificar
                                                    </button>
                                                    <button type="button"  id="<?php echo $id;?>" class="btn btn-danger col-12  my-1" data-bs-toggle="modal" data-bs-target="#eliminarJuego"   onClick="eliminardatos(<?php echo $id ?>)">
                                                        Eliminar
                                                    </button>
                                                </td> -->
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
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            function datos(id,nombre,precio,desarrollador,genero,lanzamiento,descripcion,activo){
                let inputID = document.getElementById("idJuegoEdit")
                inputID.setAttribute("value",id)
                let inputNombre = document.getElementById("nombreEdit")
                inputNombre.setAttribute("value",nombre)
                let inputprecio = document.getElementById("precioEdit")
                inputprecio.setAttribute("value",precio)
                let inputdesarrollador = document.getElementById("desarrolladorEdit")
                inputdesarrollador.setAttribute("value",desarrollador)
                let inputgenero = document.getElementById("generoEdit")
                inputgenero.setAttribute("value",genero)
                let inputlanzamiento = document.getElementById("fechaEdit")
                inputlanzamiento.setAttribute("value",lanzamiento)
                const inputdescripcion = document.getElementById("descripcionEdit")
                inputdescripcion.innerHTML = descripcion

                let inputactivo = document.getElementById("activoEdit")
                inputactivo.setAttribute("value",activo)

                //$("#nombreEdit").val(nombre);
            }
            function eliminardatos(id){
                let inputID = document.getElementById("idJuegoEliminar")
                inputID.setAttribute("value",id)
                //$("#nombreEdit").val(nombre);
            }

        </script>   
        
        
        <script>
            // $(document).ready( function () {
            //     $('#tableJuegos').DataTable();
            // } );

            $(document).ready(function() {
            $('#tablaVentas').DataTable({
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "last": "Ultima página",
                        "first": "Primer página",
                    },
                    "lengthMenu": "Mostrar MENU registros por pagina",
                    "zeroRecords": "No se encontro el registro",
                    "info": "Pagina PAGE de PAGES",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de un total de MAX registros)",
                    "sSearch": "Buscar:",
                    "emptyTable": "Sin datos para mostrar en la tabla"
                },
                buttons: [
                    'pdfHtml5'
                ],
                dom: 'Bfrtip',
            });
        });
        </script>

        <script type="text/javascript" src="datatables.min.js"></script>
        <script type="text/javascript" src="datatables.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  
        
  

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
