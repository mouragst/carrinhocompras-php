<?php

namespace app\classes;

use app\interfaces\CartInterface;

class Cart implements CartInterface {

    public function add($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$product])) {
            $_SESSION['cart'][$product] = 1;
        } else {
            $_SESSION['cart'][$product] += 1;
        }
        
    }

    public function remove($product) {
        if (!isset($_SESSION[['cart'][$product]])) {
            unset($_SESSION['cart'][$product]);
        }

    }

    public function quantity($product, $quantity) {
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product] = $quantity;
        }
    }

    public function clear() {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }

    }

    public function cart() {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }

        return [];
    }
    
    public function dump() {
        if ($_SESSION['cart']) {
            var_dump($_SESSION['cart']);
        }
        
    }

}