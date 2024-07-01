<?php

use app\classes\Cart;

require "../vendor/autoload.php";

session_start();

$cart = new Cart;
$qty = filter_input(INPUT_GET, 'qty', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($qty == 0) {
    $cart->remove($id);
} else {
    $cart->quantity($id, $qty);
}

header('Location: /cart.php');

?>