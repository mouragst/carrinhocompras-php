<?php

require "../vendor/autoload.php";

session_start();

use app\classes\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$cart = new Cart;
$cart->remove($id);

header('Location: /cart.php')

?>