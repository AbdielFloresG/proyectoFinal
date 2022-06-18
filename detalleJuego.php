<!-- Tienda GameStore 
Esta es la pagina para mostrar los detalles 
del juego seleccionado
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->
<?php
    // Se agregan los archivos obligatorios para el funcionamiento de la pagina
    require 'database/conexion.php';
    require 'database/session.php';
    require 'config/config.php';
    

    // Para generar la pagina se envia un token desde el index 
    // y se tiene que comparar con un generado en este archivo y comprobar que sea igual
    $id = isset($_GET['id']) ? $_GET['id'] : '' ;
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    //Se crea el query

    // Si el token viene vacion se envia a esta pagina
    if($id == '' || $token ==''){
        header("Location: dashboard/404.html");
        exit;
    }else{
        
        $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);
        // Si coincide
        if($token == $token_tmp){

            // Se hace el query para obtener la informacion del juego
            $query = "SELECT count(idJuego) FROM juego WHERE idJuego=? AND activo=1;";
            $sql = $conn->prepare($query);
            $sql->execute([$id]);

            
            if($sql->fetchColumn()>0){
                
                $query2 = "SELECT * FROM juego WHERE idJuego= $id AND activo=1 LIMIT 1;";
                $sql2 = $conn->prepare($query2);
                $sql2->execute();       
                $resultado = $sql2->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $row){
                    $nombreJuego = $row['nombreJuego'];
                    $precioJuego = $row['precio'];
                    $desarrolladorJuego = $row['desarrollador'];
                    $generoJuego = $row['genero'];
                    $fechaLanzamientoJuego = $row['fechaLanzamiento'];
                    $descripcionJuego = $row['descripcion'];
                }

                
                
            }
           
        // Si no coincide el token se envia a esta pagina
        }else{
            header("Location: dashboard/404.html");
        }
    }


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

    <!-- custom css -->
    <link rel = "stylesheet" href = "css/estilos.css">
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>

<?php  include('navbar.php'); ?>
<?php  include('modales/agregadoCarrito.php'); ?>

<main>
    <div class="container">
       <div class="row">
           <div class="col-md-6 order-md-1 ">
                <img src="img/productos/<?php echo $id?>/principal.jpg" alt="" class="mx-auto" style="max-width: 300px; max-height: 400px; margin:auto;">
                <!-- <img src="img/productos/1/principal.jpg" alt=""> -->
           </div>
           <div class="col-md-6 order-md-2 mt-5">
                <h2 class="text-light"><?php echo $nombreJuego?></h2>
                <h2 class="text-warning"> <?php echo "$ ".$precioJuego.".00"?> </h2>
                <p class="lead text-light"><?php echo $descripcionJuego?></p>

                <div class="d-grid gap-3 col-6 mx-auto ">
                    <button class="btn btn-warning mt-4 py-3" onclick="venderProducto(<?php echo $id;?>,'<?php echo $token_tmp;?>')"  >Comprar ahora</button>
                    <button class="btn btn-outline-warning py-3 mb-5" id="btn-carrito" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"   onclick="addProducto(<?php echo $id;?>,'<?php echo $token_tmp;?>')" >Agregar al carrito</button>
                </div>
           </div>
       </div>
    </div>
</main>



<?php include('footer.php'); ?>


    <script>
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

        function venderProducto(id,token){
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

            setTimeout(redireccionar, 500)
            
        }
        redireccionar = () =>{
            window.location.href = 'checkout.php';
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