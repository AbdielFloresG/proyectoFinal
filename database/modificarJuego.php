
<?php
    require 'conexion.php';
    $message = '';

    $id = $_POST['id'];
    $nombreJuego = $_POST['name'];
    $precioJuego = $_POST['precio'];
    $desarrolladorJuego = $_POST['desarrollador'];
    $generoJuego = $_POST['genero'];
    $anoJuego = $_POST['year'];
    $descripcionJuego = $_POST['descripcionEdit'];
    if($_POST['activo']=="1"){
        $activo = 1;
    }else{
        $activo = 0;
    }

  

    //Validar que los campos no esten vacios
    if (!empty($_POST['name']) && !empty($_POST['precio']) && !empty($_POST['desarrollador']) && !empty($_POST['genero'])){

    //Se crea el query
    $query = "UPDATE  Juego SET nombreJuego ='$nombreJuego', precio = $precioJuego, desarrollador = '$desarrolladorJuego', genero = '$generoJuego', fechaLanzamiento = $anoJuego, descripcion = '$descripcionJuego', activo = $activo WHERE idJuego = $id;";
 
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

