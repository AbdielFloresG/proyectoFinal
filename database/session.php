<?php
    session_start();
    if(isset($_SESSION['autentificado'])){

    }else{
        $_SESSION["privilegio"]='guest';
        $_SESSION["autentificado"]=false;
        $_SESSION["nombre"]="Invitado";
        $_SESSION["apellido"]="";
        $_SESSION["idUsuario"]="";
    }

    // if(!$_SESSION["autentificado"]){
        
    //     header("Location: salir.php");
    // }
?>