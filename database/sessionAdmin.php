<?php
    @session_start();
    if($_SESSION["privilegio"]!='admin'){
        header("Location: ../index.php");
    }
?>