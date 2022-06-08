<?php

  // require 'conexion.php';

  // $message = '';

  // if (!empty($_POST['email']) && !empty($_POST['password'])) {
  //   $sql = "INSERT INTO Usuario VALUES (0,:name, :lastname, :email, :password,'user')";
  //   $stmt = $conn->prepare($sql);
  //   $stmt->bindParam(':name', $_POST['name']);
  //   $stmt->bindParam(':lastname', $_POST['lastname']);
  //   $stmt->bindParam(':email', $_POST['email']);
  // //   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  //   $stmt->bindParam(':password', $_POST['password']);

  //   if ($stmt->execute()) {
  //     $message = 'Successfully created new user';
  //     header("location: ../index.php");
  //   } else {
  //     $message = 'Sorry there must have been an issue creating your account';
  //   }

  // }
?>

<?php

    if($_POST["email"]=="admin" && $_POST["password"]=="123456"){
      //inicio de sesion
      session_start();

      //Declaro variables de sesion
      $_SESSION["autentificado"]=true;
      $_SESSION["usuario"] = $_POST["admin"];

      header("Location: archivo-protegido.php");

    }else{
      header("Location: ../login.php?error=si");
    }

?>