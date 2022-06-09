<?php
    session_start();
    if($_SESSION["privilegio"]!='admin'){
        header("Location: ../database/salir.php");
    }
?>