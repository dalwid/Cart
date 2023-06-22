<?php
session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$cart = new Cart;
$cart->remove($id);

header('Location: cart.php');