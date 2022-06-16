<?php
    // <!-- Tienda GameStore 
    // Este es el index de la pagina web 
    // codigo realizado por Abdiel Flores Gastelum
    // el 10/06/22 -->
    //Archivos requeridos para el funcionamiento del index

    // Se encarga de la conexion sql mediante PDO
    require 'database/conexion.php';
    //Se cargan los archivos de la seesion
    require 'database/session.php';
    //Se cargan las variables del archivo config
    require 'config/config.php';

    //Se crea el query, se ejecuta y se procesa el resultado
    $query = "SELECT idJuego, nombreJuego, precio FROM juego WHERE activo=1 ORDER BY idJuego DESC LIMIT 5";
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

</head>
<body>
<!-- Se incluye el archivo de navbar -->
<?php  include('navbar.php'); ?>
<main>
    <!-- Se incluye el modal (Aviso de que se agregó al carrito) -->
    <?php  include('modales/agregadoCarrito.php'); ?>


    <div id="carouselExampleFade"  class="carousel slide my-4 p-1 mx-auto" style="width: 90%; max-width:800px; height:24rem;" data-bs-ride="carousel">
        
        <div class="carousel-inner h-100">
            <div class="carousel-item active px-5 h-100">
                <div class=" h-100 px-4 mx-auto" style="color: #EABE3F; box-sizing: content-box;">
                    <h1 class="mx-auto" style="width:230px; color:#fff;">Bienvenido</h1>
                    <p class="mx-auto my-4 fs-3 h-100 px-2" style="width:100%" >Bienvenido a GameStore, una tienda donde encontraras todos tus videojuegos favoritos y muchas cosas mas</p>
                   
                </div>
            </div>
            <div class="carousel-item h-100">
                <img src="img/productos/1/alt.jpg" class="d-block w-100 h-100" style="height: 100%" alt="...">
                <p style="position: absolute;">Rainbow Six Siege. Disponible ahora</p>
            </div>
            <div class="carousel-item h-100">
                <img src="img/productos/2/alt.jpg" class="d-block w-100 h-100 px-2" style="height: 100%" alt="...">
            </div>
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="titulos">
        <p>Nuevos lanzamientos</p>
    </div>





    <!-- Se hace un foreach por cada producto activo para mostrarlo en el index -->
    <div class="container containerDesc">
        <!-- Se divide en columnas el index-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  row-cols-lg-4 row-cols-xl-5 g-4">
            <?php foreach($resultado as $row) { ?>
                <div class="col align-items-stretch d-block ">
                    <div class="card shadow-sm h-100 mx-1" style="max-height: 600px;">
                        <?php 
                            $id = $row['idJuego'];
                            $imagen = "img/productos/$id/principal.jpg";
                            $nombreJuego = $row['nombreJuego'];
                            $precioJuego = $row['precio'];

                            if(!file_exists($imagen)){
                                $imagen = "img/productos/no-photo.jpg";
                            }
                        ?>
                        
                        <img src="<?php echo $imagen;?>" class="d-block" style="max-height:200px;">
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


</body>
</html>