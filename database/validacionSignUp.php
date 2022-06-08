
<?php
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
    $stmt->bindParam(':email', $_POST['email']);
  //   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $_POST['password']);
    try{
      $stmt->execute();
      $message = 'Successfully created new user';
      $_SESSION["autentificado"]=true;
      $_SESSION["usuario"] = $_POST["admin"];
      header("location: ../login.php");

    }catch(Exception $e){
      $message = 'Sorry there must have been an issue creating your account';
      header("location: ../signUp.php?error=si");
    }
    
  }
?>