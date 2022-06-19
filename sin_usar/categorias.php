<?php
    require 'database/conexion.php';
    require 'database/session.php';
    require 'config/config.php';

    //Se crea el query
    $query = "SELECT idJuego, nombreJuego, precio FROM juego WHERE activo=1;";
    $sql = $conn->prepare($query);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon.ico">
</head>
<body>
    <?php  include('navbar.php'); ?>

    <main>

        <div class="container containerDesc">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  row-cols-lg-4 row-cols-xl-5 g-4">
                <?php foreach($resultado as $row) { ?>
                    <div class="col align-items-stretch d-block ">
                        <div class="card shadow-sm h-100">
                            <?php 
                                $id = $row['idJuego'];
                                $imagen = "img/productos/$id/principal.jpg";
                                $nombreJuego = $row['nombreJuego'];
                                $precioJuego = $row['precio'];

                                if(!file_exists($imagen)){
                                    $imagen = "img/productos/no-photo.jpg";
                                }
                            ?>
                            <img src="<?php echo $imagen;?>" class="d-block w-100 ">
                            <div class="card-body">
                                <h5 class="card-title light"><?php echo $nombreJuego;?></h5>
                                <p style="color #fff;" class="card-text">$<?php echo $precioJuego;?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group ">
                                        <a href="detalleJuego.php?id=<?php echo $row['idJuego'];?>&token=<?php echo hash_hmac('sha1',$row['idJuego'],KEY_TOKEN);?>   " class="btn btn-primary py-3">Detalles</a>
                                        
                                    </div>
                                    <button class="btn btn-dark"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addProducto(<?php echo $row['idJuego'];?>,'<?php echo hash_hmac('sha1',$row['idJuego'],KEY_TOKEN);?>')" >Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </main>

    <?php
        include("footer.php")
    ?>
</body>
</html>