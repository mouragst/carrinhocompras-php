<?php

session_start();

use app\classes\Cart;
use app\classes\CartProducts;
use app\database\models\Read;

require "../vendor/autoload.php";

$cart = new Cart;
$cartProducts = new CartProducts();

$products = $cartProducts->products($cart);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Cart</title>
</head>
<body>

    <h2>Cart | <a href="/">Home </a></h2>

    <hr>

    <div id="container">
        <?php if (count($products['products']) <= 0): ?>
            <h3>Nenhum produto no carrinho!</h3>
        <?php else: ?>
            <ul>
                <?php foreach ($products['products'] as $product): ?>
                    <li class="cart-product">
                        <?php echo $product['product']?>
                        <form action="quantidade.php" method="get">
                            <input type="text" name="qty" value="<?php echo $product['quantity'];?>" id ="cart-input-qty">
                            <input type="hidden" name="id" value=<?php echo $product['id']?>>
                        </form> x R$ <?php echo number_format($product['price'], 2,",",".");?> | <?php echo number_format($product['subtotal'], 2,",",".");?> 
                        <a href="remove.php?id=<?php echo $product['id'] ?>"> | Remove</a>
                    </li>
                <?php endforeach ?>
                <hr>
            </ul>

                <div id="cart-total-clear">
                    <span id='cart-total'>
                        Total: R$ <?php echo number_format($products['total'], 2,",","."); ?>
                    </span>

                    <span id="cart-clear">
                        <a href="clear.php">Clear cart</a>
                    </span>
                </div>
        <?php endif ?>
    </div>
    
</body>
</html>