<?php

namespace app\classes;

use app\database\models\Read;
use app\interfaces\CartInterface;

class CartProducts{

    public function products(CartInterface $cartInterface) {    

        $productsInCart = $cartInterface->cart();
        $productsInDatabase = (new Read)->all('products');

        $products = [];
        $total = 0;

        foreach($productsInCart as $productId => $productQuantity) {
            $product = [...array_filter($productsInDatabase, fn($product) => (int)$product->id === $productId)];

            $products[] = [
                'id' => $productId,
                'product' => $product[0]->name,
                'price' => $product[0]->price,
                'quantity' => $productQuantity,
                'subtotal' => $productQuantity * $product[0]->price
            ];

            $total += $productQuantity * $product[0]->price;
        }

        return [
            'products' => $products,
            'total' => $total,
        ];
    }
}
