<?php
    require 'database/conexion.php';
    require 'database/session.php';
    require 'config/config.php';

    $productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null;

    //print_r($_SESSION);
    $lista_carrito = array();

    if($productos != null){
        foreach($productos as $clave =>$cantidad){

            $query = "SELECT idJuego, nombreJuego, precio, $cantidad AS cantidad FROM Juego WHERE idJuego=? AND activo=1;";
            $sql = $conn->prepare($query);
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
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

    <main>
        <div class="container">
            <div class="table-responsive bg-light">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Carrito vacio</b></td></tr>';
                        } else{
                            $total = 0;
                            foreach($lista_carrito as $producto){
                                $_id = $producto['idJuego'];
                                $_nombre = $producto['nombreJuego'];
                                $cantidad = $producto['cantidad'];
                                $_precio = $producto['precio'];
                                $subtotal = $cantidad * $_precio;
                                $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $_nombre;?></td>
                            <td><?php echo '$'.number_format($_precio,2,'.',',');?></td>
                            <td>
                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad;?>" size="5" id="cantidad_<?php echo $_id;?>" onchange="">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id?>" name="subtotal[]"><?php echo '$'.number_format($subtotal,2,'.',',');?> </div>
                            </td>
                            <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id;?>" data-ds-toggle="modal" data-bs-target="eliminarModal">Eliminar</a></td>
                        </tr>
                        <?php }?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo "$".number_format($total,2,'.',',');?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php }?>
                </table>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <button class="btn btn-warning my-3 btn-lg">Realizar pago</button>
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