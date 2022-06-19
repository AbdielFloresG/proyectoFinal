<?php 

print_r($datos);
require '../database/session.php';
require '../config/config.php';

require '../database/conexion.php';
$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
var_dump($datos);
print_r($datos);
echo '<pre>';

if(is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('T-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    
    

$query="INSERT INTO venta (idVenta, idTransaccion, idUsuario,descripcion,fechaVenta, monto) VALUES (0,$id_transaccion,$idUsuario,'$status','$fecha',$monto)";

//     $query="INSERT INTO Venta (idVenta, idTransaccion, idUsuario,descripcion,fechaVenta, monto) VALUES (0,$id_transaccion,$idUsuario,'$status','$fecha',$monto)";

//     //header("Location: ../index.php?$query");
//     //$sql = $conn->prepare("INSERT INTO venta (idTransaccion, idUsuario,descripcion,fechaVenta, monto) VALUES (?,?,?,?,?)");
//     $sql = $conn->prepare($query);
    
//     //$sql->execute([$id_transaccion,'1',$status,$fecha_nueva,$monto]);
//     $sql->execute();
//    // $id = $conn->lastInsertId();
//     //header("Location: ../index.php");
}


?>