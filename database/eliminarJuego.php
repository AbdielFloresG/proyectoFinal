
<?php
    require 'conexion.php';
    $message = '';

    $id = $_POST['id'];
    
  
    //Validar que los campos no esten vacios
    if (!empty($_POST['id'])){

    //Se crea el query
    $query = "DELETE FROM juego  WHERE idJuego = $id;";
 
    $stmt = $conn->prepare($query);

    try{
        $stmt->execute();
        $message = 'Successfully created new user';
        header("Location: ../dashboard/tables.php?jalo=si");
        
    }catch(Exception $e){
        $message = 'Sorry there must have been an issue creating your account';
        header("Location: ../dashboard/tables.php?error2=si");
    }

    }



?>

