<?php

    session_start();
    session_destroy();
    require '../config/config.php';

    header("Location: ../index.php")
?>