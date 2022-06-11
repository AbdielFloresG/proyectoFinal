<?php
    require 'conexion.php';
    $message = '';

    $id = $_POST['id'];
    $nombreUsuario = $_POST['name'];
    $apellidoUsuario = $_POST['lastname'];
    $emailUsuario = $_POST['email'];
    $rolUsuario = $_POST['rolUsuario'];

  

    //Validar que los campos no esten vacios
    if (!empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['lastname']) && !empty($_POST['email'])){

    //Se crea el query
    $query = "UPDATE  usuario SET nombreUsuario ='$nombreUsuario', apellidoUsuario = '$apellidoUsuario', correoUsuario = '$emailUsuario', rolUsuario = '$rolUsuario' WHERE idUsuario = $id;";
 
    $stmt = $conn->prepare($query);

    try{
        $stmt->execute();
        $message = 'Successfully created new user';
        //echo $id." ".$nombreUsuario." ".$apellidoUsuario." ".$emailUsuario." ".$rolUsuario;
        header("Location: ../dashboard/tablesUsuario.php?jalo=si");
        
    }catch(Exception $e){
        $message = 'Sorry there must have been an issue creating your account';
        header("Location: ../dashboard/tablesUsuario.php?error2=si");
    }

    }



?>
