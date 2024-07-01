<?php

session_start();

use app\classes\Cart;
use app\database\models\Read;

require __DIR__ . '/../vendor/autoload.php';

$products = require "../app/helpers/products.php";

$cart = new Cart;

$read = new Read;
$products = $read->all('products');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <h3><?php echo count($cart->cart()); ?> products in cart |  <a href="cart.php"> Go to cart</a></h3>
        <ul>
            <?php foreach($products as $product) : ?>
                <li>
                    <?php echo $product->name; ?> | R$ <?php echo number_format($product->price, 2,",","."); ?> | 
                    <a href="add.php?&id=<?php echo $product->id; ?>">add to cart</a>
                </li> 
            <?php endforeach; ?>
        </ul>
    </div>
    
</body>
</html>