<?php
    require 'database/conexion.php';
    require 'database/session.php';
    require 'config/config.php';


    $productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null;

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


          <!-- Modal -->
        <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el juego del carrito?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-elimina"type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
                </div>
            </div>
        </div>

        
        <div class="container formulario">
            <div class="table-responsive bg-transparent text-light p-4">
                <table class="table" >
                    <thead>
                        <tr class="text-light">
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-light">
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
                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad;?>" size="5" id="cantidad_<?php echo $_id;?>" onchange="actualizaCantidad(this.value, <?php echo $_id?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo '$'.number_format($subtotal,2,'.',',');?> </div>
                            </td>
                            <td><a  id="eliminar" class="btn btn-warning " data-bs-id="<?php echo $_id;?>" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</a></td>
                        </tr>
                        <?php }?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3 " id="total">Total a pagar: <?php echo "$".number_format($total,2,'.',',');?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php }?>
                </table>
            </div>
            <?php if($lista_carrito != null){ ?>
                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <a href="pagoLocal.php" class="btn btn-warning btn-lg my-4 mx-3 fs-2">Realizar pago</a>
                    </div>
                </div>
            <?php }?>
        </div>


        <br><br><br><br><br><br><br><br><br><br><br>

    </main>


  


    <?php include('footer.php'); ?>

        <script>
            let eliminaModal = document.getElementById('eliminarModal');
            eliminaModal.addEventListener('show.bs.modal',function(event){
                let button = event.relatedTarget
                let id = button.getAttribute('data-bs-id')
                let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
                buttonElimina.value = id
            })


                        
            function actualizaCantidad(cantidad, id){
                let url = 'clases/actualizar_carrito.php'
                let formData = new FormData()
                formData.append('action','agregar')
                formData.append('id',id)
                formData.append('cantidad',cantidad)

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        let divsubtotal = document.getElementById('subtotal_'+ id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]');

                        for(let i=0; i<list.length;i++ ){
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }

                        total = new Intl.NumberFormat('en-US',{
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo "Total a pagar: $"; ?>' + total
                    }
                })
            }

            function eliminar(){

                

                let botonElimina = document.getElementById('btn-elimina')
                let id = botonElimina.value
     

                let url = 'clases/actualizar_carrito.php'
                let formData = new FormData()
                formData.append('action','eliminar')
                formData.append('id',id)


                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        console.log('Se mete')
                        location.reload()
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