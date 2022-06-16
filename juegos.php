<!-- Tienda GameStore 
Este es el index de la pagina web 
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->


<?php
    //Archivos requeridos para el funcionamiento del index

    // Se encarga de la conexion sql mediante PDO
    require 'database/conexion.php';
    //Se cargan los archivos de la seesion
    require 'database/session.php';
    //Se cargan las variables del archivo config
    require 'config/config.php';

    //Se crea el query, se ejecuta y se procesa el resultado
    $query = "SELECT idJuego, nombreJuego, precio FROM juego WHERE activo=1 ORDER BY idJuego ";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>

<!-- Se incluye el archivo de navbar -->
<?php  include('navbar.php'); ?>


<main>
    <!-- Se incluye el modal (Aviso de que se agregó al carrito) -->
    <?php  include('modales/agregadoCarrito.php'); ?>

    <!-- Se hace un foreach por cada producto activo para mostrarlo en el index -->
    <div class="container containerDesc">
        <!-- Se divide en   columnas el index-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  row-cols-lg-4 row-cols-xl-5 g-4">
            <?php foreach($resultado as $row) { ?>
                <div class="col align-items-stretch d-block ">
                    <div class="card shadow-sm h-100" style="max-height: 600px;">
                        <?php 
                            $id = $row['idJuego'];
                            $imagen = "img/productos/$id/principal.jpg";
                            $nombreJuego = $row['nombreJuego'];
                            $precioJuego = $row['precio'];

                            if(!file_exists($imagen)){
                                $imagen = "img/productos/no-photo.jpg";
                            }
                        ?>
                        
                        <img src="<?php echo $imagen;?>" class="d-block" style="max-height:250px;">
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

<!-- Se incluye el archivo del footer -->
<?php include('footer.php'); ?>

    <script>
        // Funcion para agregar productos al carrito
        function addProducto(id,token){
            let url = 'clases/carrito.php'
            let formData = new FormData()
            formData.append('id',id)
            formData.append('token',token)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>


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