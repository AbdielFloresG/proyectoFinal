<!-- Tienda GameStore 
Esta es la pagina para crear una nueva cuenta
codigo realizado por Abdiel Flores Gastelum
el 10/06/22 -->

<?php
    //Se solicitan los archivos necesarios para el funcionamiento de la pagina
    require 'database/conexion.php';
    require 'database/session.php';
    require 'config/config.php';

    print_r($_SESSION);
    if($_SESSION['privilegio']=="guest"){
        header("Location: login.php?error2=si");
    }

    //Se guardan en la variable productos los productosn del carrito que estan almacenados en la variable session
    $productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null;
    $lista_carrito = array();

    //Si exiten productos
    if($productos != null){
        //Se consultan los demas datos de los productos con el id guardado en la variable
        foreach($productos as $clave =>$cantidad){
            $query = "SELECT idJuego, nombreJuego, precio, $cantidad AS cantidad FROM Juego WHERE idJuego=? AND activo=1;";
            $sql = $conn->prepare($query);
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }else{
        //Si no existen se redirecciona al index
        header("Location: index.php");
        exit;
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
        <!-- container de la tabla de los productos -->
        <div class="container mx-auto text-light formulario" style="max-width: 900px;">
            <h2 class="text-warning mx-auto " style="max-width:280px;">Detalles de pago</h4>
            <div class="row">
                <div class="">
                    <div class="table-responsive bg-bg-transparent p-4">
                        <table class="table text-light" >
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-light">
                                <!-- Si no hay se muestra carrito vacio -->
                                <?php if($lista_carrito == null){
                                    echo '<tr><td colspan="5" class="text-center"><b>Carrito vacio</b></td></tr>';
                                } else{
                                    $total = 0;
                                    // Se hace un foreach para mostrar los productos
                                    foreach($lista_carrito as $producto){
                                        $_id = $producto['idJuego'];
                                        $_nombre = $producto['nombreJuego'];
                                        $cantidad = $producto['cantidad'];
                                        $_precio = $producto['precio'];
                                        $subtotal = $cantidad * $_precio;
                                        $total += $subtotal;
                                ?>
                                <tr>
                                    <td class="text-light"><?php echo $_nombre;?></td>
                                    <td class="text-light">
                                        <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo '$'.number_format($subtotal,2,'.',',');?> </div>
                                    </td>
                                </tr>
                                <?php }?>

                                <tr>
                                    <td class="text-light" colspan="0"></td>
                                    <td  class="text-light" colspan="0">
                                        <p class="h3 text-end text-warning " id="total">Total a pagar: <?php echo "$".number_format($total,2,'.',',');?></p>
                                    </td>
                                </tr>

                            </tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row ">
                <!-- Boton para pagar, y se redirecciona a la pagina de captura local -->
                
                <div class="">
                    <a href="capturaLocal.php" class="btn btn-warning p-3 fs-3 mx-auto">Pagar</a>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
    </main>

    <?php include('footer.php'); ?>
    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID?>&currency=<?php echo CURRENCY?>"></script>
    
    <script>
        
    </script>
    </body>

</html>