
<?php
  require 'conexionSQLI.php';
  $nombreJuego = $_POST['name'];
  $precioJuego = $_POST['precio'];
  $desarrolladorJuego = $_POST['desarrollador'];
  $generoJuego = $_POST['genero'];
  $anoJuego = $_POST['year'];
  $descripcionJuego = $_POST['description'];
  if($_POST['activo']=="1"){
      $activo = 1;
  }else{
      $activo = 0;
  }

  
 

  $consulta = ("SELECT * FROM juego WHERE nombreJuego = '$nombreJuego' LIMIT 1");
  $ejecutarConsulta = mysqli_query($conn, $consulta) or die ("No se pudo ejecutar la consulta sql");
  if(!$ejecutarConsulta){ 
    // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
    header("Location: ../dashboard/tables.php?error=si");
    echo mysqli_error($mysqli);
    // si la consulta falla es bueno evitar que el código se siga ejecutando
  } 

  if(!mysqli_fetch_assoc($ejecutarConsulta)) {
  //Validacion con conexion PDO
  //Solicitar conexion PDO
  require 'conexion.php';
  $message = '';

  //Validar que los campos no esten vacios
  if (!empty($_POST['name']) && !empty($_POST['precio']) && !empty($_POST['desarrollador']) && !empty($_POST['genero'])){

    //Se crea el query
    $query = "INSERT INTO Juego VALUES (0,'$nombreJuego', $precioJuego, '$desarrolladorJuego', '$generoJuego', $anoJuego,'$desarrolladorJuego', $activo);";
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
    

  } else {

      header("Location: ../dashboard/tables.php?error3=si");
      // Usuario El usuario ya existe
  }



?>

