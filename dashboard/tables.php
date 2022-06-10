<?php

    require '../database/conexionSQLI.php';
    require '../database/conexion.php';
    require '../database/sessionAdmin.php';

    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];

    $query = "SELECT * FROM Juego;";
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
        <title>Tablas Admin</title>
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
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                   
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
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
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficas
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas
                            </a>
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
                        <div class="small">Logged in as:</div>
                        <?php echo $nombre." ".$apellido."  ";?>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <!--        Modales         -->
                    <?php include('../database/modals/agregarJuegoModal.php')?>

                    <div class="modal fade" id="modificarJuego" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Editar juego juego</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="Agregar juego" action="../database/agregarJuego.php" method="POST">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre del juego: </label>
                                            <input type="text" id="nombreEdit" class="form-control" name="name" placeholder="Nombre" required="true">
                                        </div>
                                        <div class="mb-3">
                                            <label for="precio" class="form-label">Precio: </label>
                                            <input type="text" id="precioEdit" class="form-control" name="precio" placeholder="Precio" required="true">
                                        </div>
                                        <div class="mb-3">
                                            <label for="desarrollador" class="form-label">Desarrollador: </label>
                                            <input type="text" id="desarrolladorEdit" class="form-control" name="desarrollador" placeholder="Desarrollador" required="true">
                                        </div>
                                        <div class="mb-3">
                                            <label for="genero" class="form-label">Genero: </label>
                                            <input type="text" id="generoEdit" class="form-control" name="genero" placeholder="Genero" required="true">
                                        </div>
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Año de lanzamiento: </label>
                                            <input type="text" id="fechaEdit" class="form-control" name="year" placeholder="Año" required="true">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcionEdit" class="form-label">Descripcion</label>
                                            <textarea id="descripcionEdit" class="form-control"name="descripcionEdit" rows="3" required="true" max-length="250"></textarea>
                                        </div>


                                        <div class="mb-3">
                                            <label for="activo" class="form-label">Activo</label>
                                            <select class="form-select" id="activoEdit" name="activo" aria-label="Default select example" required="true">
                                                <option selected>Selecciona una opcion</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="eliminarJuego" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                Juegos
                            </div>
                           
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <button type="button" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#agregarJuego">
                                        Agregar juego
                                    </button>
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
                                            <th>Acciones</th>

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
                                            <th>Acciones</th>
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
                                                <td><?php echo $activo;?> </td>
                                                <td> 
                                                    <button type="button"   id="<?php echo $id;?>" class="btn btn-info my-1" data-bs-toggle="modal" data-bs-target="#modificarJuego"  onClick="datos(<?php echo $id ?>,'<?php echo $nombreJuego ?>','<?php echo $precioJuego ?>','<?php echo $desarrollador ?>','<?php echo $genero ?>','<?php echo $fechaLanzamiento ?>','<?php echo $descripcion ?>','<?php echo $activo ?>')">
                                                        Modificar
                                                    </button>
                                                    <button type="button"  id="<?php echo $id;?>" class="btn btn-danger my-1" data-bs-toggle="modal" data-bs-target="#eliminarJuego">
                                                        Eliminar
                                                    </button>
                                                </td>
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

        </script>                                
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
