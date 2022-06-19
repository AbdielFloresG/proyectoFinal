
<?php
    require 'conexion.php';
    $message = '';

    $id = $_POST['id'];
    
    //Validar que los campos no esten vacios
    if (!empty($_POST['id'])){

    //Se crea el query
    $query = "DELETE FROM usuario  WHERE idUsuario = $id;";
 
    $stmt = $conn->prepare($query);

    try{
        $stmt->execute();
        $message = 'Successfully created new user';
        header("Location: ../dashboard/tablesUsuario.php?jalo=si");
        
    }catch(Exception $e){
        $message = 'Sorry there must have been an issue creating your account';
        header("Location: ../dashboard/tablesUsuario.php?error2=si");
    }

    }



?>

