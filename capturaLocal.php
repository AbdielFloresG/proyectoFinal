<?php 
require 'database/conexionSQLI.php';
require 'database/conexion.php';
require 'database/session.php';
require 'config/config.php';

    $productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null;
    $idUsuario = $_SESSION["idUsuario"];
  
   
    

    if($productos != null){
        foreach($productos as $clave =>$cantidad){

            $query = "SELECT idJuego, nombreJuego, precio, $cantidad AS cantidad FROM Juego WHERE idJuego=? AND activo=1;";
            $sql = $conn->prepare($query);
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }else{
        header("Location: index.php");
        exit;
    }

    //print_r($lista_carrito);
    //echo $lastId;


    // //Se crea el query
    // $query = "INSERT INTO detalleJuego VALUES (0,$lastId,1,2);";
    // $stmt = $conn->prepare($query);

    // try{
    //   $stmt->execute();
    //   $message = 'Successfully created new user';
   
      
    // }catch(Exception $e){
    //   $message = 'Sorry there must have been an issue creating your account';

    // }

     


    if($lista_carrito == null){
        echo '<tr><td colspan="5" class="text-center"><b>Carrito vacio</b></td></tr>';
    } else{
        $total = 0;
        foreach($lista_carrito as $producto){
            $_precio = $producto['precio'];
            $subtotal = $cantidad * $_precio;
            $total += $subtotal;
        }

        $dt = date('Y-m-d h:i:s');
        $query = "INSERT INTO Venta Values (0,$idUsuario,'$dt',$total)";
        $sql = $conn->prepare($query);
        $sql->execute();




            
        $consulta =("SELECT MAX(idVenta) AS id FROM venta");
        $rs = mysqli_query($con, $consulta);
        if ($row = mysqli_fetch_row($rs)) {
        $lastId = trim($row[0]);
        
        }

    

        foreach($lista_carrito as $producto){
            $_id = $producto['idJuego'];
            $_nombre = $producto['nombreJuego'];
            $cantidad = $producto['cantidad'];
            $_precio = $producto['precio'];
            $subtotal = $cantidad * $_precio;
            $total += $subtotal;



            $query = "INSERT INTO detalleVenta Values (0,$lastId,$_id,'$_nombre',$cantidad)";
            $sql = $conn->prepare($query);
            $sql->execute();

            echo $query;
        }
        
        //echo $dt;
        


 
        $_SESSION['carrito']['productos']=(!isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null);

        header("Location: ventaExitosa.php?$lastId");

        //echo $query;
    }
