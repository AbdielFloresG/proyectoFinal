<?php

  require 'conexionSQLI.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $consulta = ("SELECT * FROM usuario WHERE correoUsuario = '$email' AND passwordUsuario = '$password' LIMIT 1");
  $ejecutarConsulta = mysqli_query($conn, $consulta) or die ("No se pudo ejecutar la consulta sql");

  if(!$ejecutarConsulta){ 
    // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
    header("Location: ../login.php?error=si");
    echo mysqli_error($mysqli);
    // si la consulta falla es bueno evitar que el código se siga ejecutando
  } 

  if(mysqli_fetch_assoc($ejecutarConsulta)) {
      // el usuario y la pwd son correctas
    //inicio de sesion
    session_start();
    //Declaro variables de sesion
    $_SESSION["autentificado"]=true;
    $_SESSION["usuario"] = $_POST["admin"];

    header("Location: archivo-protegido.php");

  } else {
      header("Location: ../login.php?error2=si");
      // Usuario incorrecto o no existe
  }



?>