<?php
session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$cart = new Cart();
$cart->add($id);

// $cart->dump();

header('Location: /');