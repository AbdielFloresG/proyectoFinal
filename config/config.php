<?php

define("KEY_TOKEN","EL-Vi13J0N.xd");
define("CLIENT_ID","ASHl05zjyfitu1M3eEl6GHpYFFYUup5erHtnibpT6xmZB21BzA3ZQM6_FxT5rz9GOBjQp5JH3XKwXlQq");
define("CURRENCY","MXN");
$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>