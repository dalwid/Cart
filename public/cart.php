<?php
session_start();

require '../vendor/autoload.php';

use app\classes\Cart;
use app\classes\CartProducts;
use app\database\models\Read;

$cartProducts = new CartProducts();

$products = $cartProducts->products(new Cart);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cart</title>
</head>
<body>

    <h2>Cart | <a href="/">Home</a></h2>
    <hr>
    
    <div id="container">
        <?php if(count($products['product']) <= 0): ?>
            <h3>Nenhum Produto no carrinho de compras</h3>

        <?php else: ?>
            <ul>
                <?php foreach($products['product'] as $product):?>
                    <li class="cart-product">
                        <?= $product['product'] ?>
                        <form action="quantidade.php" method="get">
                            <input type="text" name="qty" value="<?= $product['qty'] ?>" id="cart-input-qty">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        </form> X R$ <?= number_format($product['price'], 2, ',', '.') ?> | <?= number_format($product['subtotal'], 2, ',', '.') ?>
                         | <a href="remove.php?id=<?= $product['id'] ?>" id="cart-remove">Remove</a>
                    </li>
                <?php endforeach;?>    
            </ul>

            <div id="cart-total-clear">
                <span id="cart-total">
                    Total: R$ <?= number_format($products['total'], 2, ',', '.')?>
                </span>

                <span id="cart-clear">
                    <a href="clear.php">Clear Cart</a>
                </span>
            </div>

        <?php endif; ?>
    </div>

</body>
</html>
