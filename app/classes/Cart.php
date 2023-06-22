<?php

namespace app\classes;

use app\interfaces\CartInterface;

class Cart implements CartInterface
{
    public function add($product)
    {
        if(!isset($_SESSION['cart'])){ $_SESSION['cart'] = []; }

        (!isset($_SESSION['cart'][$product])) ? $_SESSION['cart'][$product] = 1 : $_SESSION['cart'][$product] += 1;
    }

    public function remove($product)
    {
        if(isset($_SESSION['cart'][$product])){
            unset($_SESSION['cart'][$product]);
        }
    }

    public function quantity($product, $quantity)
    {
        if(isset($_SESSION['cart'][$product])){
            if($quantity === 0 || $quantity === ''){
                $this->remove($product);
                return;
            }

            $_SESSION['cart'][$product] = $quantity;
        }
    }

    public function clear()
    {
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }

    public function cart()
    {
        if(isset($_SESSION['cart'])){ return $_SESSION['cart']; } 
        return [];
    }

    public function dump()
    {
        if(isset($_SESSION['cart'])){
            var_dump($_SESSION['cart']);
        }
    }
}