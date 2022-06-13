<?php

  require 'conexionSQLI.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $consulta = ("SELECT * FROM usuario WHERE correoUsuario = '$email' AND passwordUsuario = '$password' LIMIT 1");
  $ejecutarConsulta = mysqli_query($con, $consulta) or die ("No se pudo ejecutar la consulta sql");

  if(!$ejecutarConsulta){ 
    // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
    header("Location: ../login.php?error=si");
    echo mysqli_error($mysqli);
    // si la consulta falla es bueno evitar que el código se siga ejecutando
  } 

  if(mysqli_fetch_assoc($ejecutarConsulta)) {
      // el usuario y la pwd son correctas
    //inicio de sesion
    $consulta2 = ("SELECT * FROM usuario WHERE correoUsuario = '$email' AND passwordUsuario = '$password' LIMIT 1");
    $resultado = $con->query($consulta2);
    //$ejecutarConsulta2 = mysqli_query($conn, $consulta) or die ("No se pudo ejecutar la consulta sql");

    $num = $resultado->num_rows; 
    $row = $resultado->fetch_assoc();
    $permiso = $row['rolUsuario'];

    if($permiso=='admin'){
      session_start();
      //Declaro variables de sesion
      $_SESSION["privilegio"]='admin';
      $_SESSION["autentificado"]=true;
      $_SESSION["nombre"] = $row["nombreUsuario"];
      $_SESSION["apellido"] = $row["apellidoUsuario"];
      $_SESSION["email"] = $row["correoUsuario"];
      $_SESSION["idUsuario"] = $row["idUsuario"];
      header("Location: ../dashboard/principal.php");
    }else{
      session_start();
      //Declaro variables de sesion
      $_SESSION["privilegio"]='user';
      $_SESSION["autentificado"]=true;
      $_SESSION["nombre"] = $row["nombreUsuario"];
      $_SESSION["apellido"] = $row["apellidoUsuario"];
      $_SESSION["email"] = $row["correoUsuario"];
      $_SESSION["idUsuario"] = $row["idUsuario"];
      header("Location: ../index.php");
      
    }
  } else {
      header("Location: ../login.php?error=si");
      // Usuario incorrecto o no existe
  }



?>