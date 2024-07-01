<?php

use app\classes\Cart;

require "../vendor/autoload.php";

session_start();

$cart = new Cart;
$cart->clear();

header('Location: /cart.php')

?>