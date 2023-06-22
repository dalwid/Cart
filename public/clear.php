<?php
session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

(new Cart)->clear();

header('Location: cart.php');