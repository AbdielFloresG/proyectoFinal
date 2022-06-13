
<?php
require '../config/config.php';
  require 'conexionSQLI.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $consulta = ("SELECT * FROM usuario WHERE correoUsuario = '$email' LIMIT 1");
  $ejecutarConsulta = mysqli_query($con, $consulta) or die ("No se pudo ejecutar la consulta sql");
  if(!$ejecutarConsulta){ 
    // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
    header("Location: ../signUp.php?error=si");
    echo mysqli_error($mysqli);
    // si la consulta falla es bueno evitar que el código se siga ejecutando
  } 

  if(!mysqli_fetch_assoc($ejecutarConsulta)) {
    

  //Validacion con conexion PDO

  //Solicitar conexion PDO
  require 'conexion.php';
  $message = '';

  //Validar que los campos no esten vacios
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['lastname'])){

    //Se crea el query
    $query = "INSERT INTO Usuario VALUES (0,:name, :lastname, :email, :password,'user');";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':email', strtolower($_POST['email']));
    $passwordCifrada = hash_hmac('sha1',$_POST['password'], KEY_TOKEN);
  //   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$passwordCifrada);
    try{
      $stmt->execute();
      $message = 'Successfully created new user';
  
      header("location: ../login.php?$passwordCifrada");

    }catch(Exception $e){
      $message = 'Sorry there must have been an issue creating your account';
      header("location: ../signUp.php?error=si");
    }
    
  }
    

  } else {

      header("Location: ../signUp.php?error4=si");
      // Usuario El usuario ya existe
  }



?>

