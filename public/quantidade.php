<?php

session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

$quantity  = filter_input(INPUT_GET, 'qty', FILTER_DEFAULT);
$id        = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$cart = new Cart;
$cart->quantity($id, $quantity);

header('Location:cart.php');