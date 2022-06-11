<?php

define("KEY_TOKEN","EL-Vi13J0N.xd");
$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>